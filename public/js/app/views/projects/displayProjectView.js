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
                    'click #addProductsToProject'   : 'redirectToProductsAdding',
                    'click #addModulesToProject'    : 'redirectToModulesAdding'
                },

                initialize: function (options) {
                    this.channel = Radio.channel('Projects');

                    BaseItemView.prototype.initialize.apply(this, arguments);

                    this.render();
                },

                onShow : function () {
                    this.$el.find('[data-toggle="tooltip"]').tooltip();
                },

                getTotalPriceOfModules : function () {
                    var totalModule = 0;

                    this.modules = this.model.get('modules');

                    for(var i = 0; i < this.modules.length; i++) {
                        totalModule += this.modules[i].quantity * this.modules[i].price;
                    }

                    return totalModule;
                },

                goBack : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate('#home', {trigger:true});
                },

                deleteProject : function (e) {
                    e.preventDefault();

                    if(confirm("Voulez-vous réellement supprimer ce projet ?")) {
                        console.log('confirm suppress');
                    }
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
                    this.data.total = this.getTotalPriceOfModules();

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }

            });

            return DisplayProjectView;
        });