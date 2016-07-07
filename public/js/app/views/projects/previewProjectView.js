define(["backbone",
        "backbone.radio",
        "marionette",
        "jquery",
        "underscore",
        "baseItemView",
        "models/project",
        "models/customer",
        "hbs!/js/app/templates/projects/previewProject"],
        function (Backbone, Radio, Marionette, $, _,
                  BaseItemView,
                  ProjectModel, CustomerModel,
                  PreviewProjectTemplate) {
            "use strict";

            var PreviewProjectView = BaseItemView.extend({
                template: PreviewProjectTemplate,

                events : {
                    'click #validateProject'    : 'validateProject',
                    'click .back'               : 'redirectToProductsAdding'
                },

                initialize: function (options) {
                    this.channel = Radio.channel('Projects');

                    BaseItemView.prototype.initialize.apply(this, arguments);

                     this.setTotalPriceOfModules();
                    this.render();
                },

                onShow : function () {
                    this.$el.find('[data-toggle="tooltip"]').tooltip();
                },

                onDestroy : function () {
                    this.channel.off();
                },

                setTotalPriceOfModules : function () {
                    var totalModule = 0,
                        products,
                        modules,
                        total;

                    products = this.model.get('products');

                    products.each(function(product) {
                        modules = product.get('modules');
                        modules.each(function(module) {
                            total = module.get('quantity') * module.get('moduleNature').price;
                            totalModule += total + (total * 0.2);
                        });
                        product.set('totalModules', totalModule);
                    });
                },

                validateProject : function (e) {
                    e.preventDefault();

                    var that = this;

                    this.model.set('status', 'pending');

                    that.channel
                        .request('saveProject', this.model)
                        .then(function(projectModel){
                            that.model = new ProjectModel(projectModel);
                            Backbone.history.navigate("home", {trigger:true});
                        });
                },

                redirectToProductsAdding : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate(
                        "projects/edit/"+ this.model.id + "/step1/products/edit", {trigger:true}
                    );
                },

                serializeData : function () {
                    this.data.project = this.model.toJSON();

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }
            });

            return PreviewProjectView;
        });
