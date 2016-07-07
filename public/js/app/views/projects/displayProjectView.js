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
                    'click #addModulesToProject'    : 'redirectToModulesAdding',
                    'click .deleteProduct'          : 'deleteProduct'
                },

                initialize: function (options) {
                    this.channel = Radio.channel('Projects');
                    this.ProductChannel = Radio.channel('Products');

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

                goBack : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate('#home', {trigger:true});
                },

                deleteProject : function (e) {
                    e.preventDefault();
                    var that = this;

                    if(confirm("Voulez-vous réellement supprimer ce projet ?")) {
                        this.channel
                            .request('deleteProject', this.model)
                            .then(function(model, response) {
                                that.showSuccessMessage(response);
                                Backbone.history.navigate('home', {trigger:true});
                            });
                    }
                },

                deleteProduct : function (e) {
                    e.preventDefault();
                    var that = this,
                        productId = $(e.currentTarget).data('product-id');

                    if(productId && confirm("Voulez-vous réellement supprimer ce produit ?")) {
                        this.ProductChannel
                            .request('deleteProduct', this.model.get('products').findWhere({id:productId}))
                            .then(function(model, response) {
                                that.showSuccessMessage(response);
                                that.render();
                            });
                    }
                },

                showSuccessMessage : function(successMessage) {
                    var $form = this.$el.find('#message');

                    $('html, body').animate({scrollTop : 0}, 500);

                    $form.find('.alert').fadeIn(600, function() {
                        $(this).addClass('alert-success')
                        $(this).removeClass('alert-danger hide')
                        $(this).html(successMessage);
                    });

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

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }

            });

            return DisplayProjectView;
        });