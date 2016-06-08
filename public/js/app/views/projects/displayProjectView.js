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

                initialize: function (options) {
                    var that = this;

                    this.channel = Radio.channel('Projects');

                    BaseItemView.prototype.initialize.apply(this, arguments);

                    this.render();
                },

                onDomRefresh : function () {
                    /*var that = this,
                        totalModule = 0;
                    this.data.modules = this.modulesCollection.toJSON();
                    this.data.product = this.productsCollection.toJSON();
                    this.data.range = this.rangeModel.toJSON();

                    for(var i = 0; i < this.data.modules.length; i++) {
                        totalModule += this.data.modules[i].quantity * this.data.modules[i].moduleNature.price;
                    }

                    this.data.total = totalModule;*/
                },

                serializeData : function () {

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }

            });

            return DisplayProjectView;
        });