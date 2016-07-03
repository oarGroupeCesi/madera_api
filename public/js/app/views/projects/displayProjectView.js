define(["backbone",
        "backbone.radio",
        "marionette",
        "jquery",
        "underscore",
        "baseItemView",
        "models/project",
        "models/customer",
        "hbs!/js/app/templates/projects/displayProject"],
        function (Backbone, Radio, Marionette, $, _,
                BaseItemView,
                ProjectModel, CustomerModel,
                DisplayProjectTemplate) {
            "use strict";

            var DisplayProjectView = BaseItemView.extend({

                template: DisplayProjectTemplate,

                events : {
                    'click #goBack'                 : 'goBack',
                    'click #deleteProject'          : 'deleteProject',
                    'click #editProject'            : 'redirectToEditProject',
                    'click #addProductsToProject'   : 'redirectToProductsAdding',
                    'click #addModulesToProject'    : 'redirectToModulesAdding'
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

                setTotalPriceOfModules : function () {
                    var totalModule = 0,
                        products,
                        modules;

                    products = this.model.get('products');

                    products.each(function(product) {
                        modules = product.get('modules');
                        modules.each(function(module) {
                            totalModule += (module.get('quantity') * module.get('moduleNature').price)
                                        +(module.get('quantity') * module.get('moduleNature').price * 0.2);
                        });
                        product.set('totalModules', totalModule);
                    });
                },

                goBack : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate('#home', {trigger:true});
                },

                deleteProject : function (e) {
                    e.preventDefault();

                    if(confirm("Voulez-vous réellement supprimer ce projet ?")) {
                        this.channel
                            .request('deleteProject', this.model)
                            .then(function(response) {
                                console.log(response);
                            });
                    }
                },

                redirectToEditProject : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate("projects/edit/"+this.model.id, {trigger:true});
                },

                redirectToProductsAdding : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate("projects/edit/"+this.model.id+"/step1/products/edit", {trigger:true});
                },

                redirectToModulesAdding : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate("projects/edit/"+this.model.id+"/step2/modules/edit", {trigger:true});
                },

                serializeData : function () {
                    this.data.project = this.model.toJSON();

                    console.log(this.data);

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }

            });

            return DisplayProjectView;
        });