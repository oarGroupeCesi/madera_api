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
                    'click #validateProject' : 'validateProject'
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

                serializeData : function () {
                    this.data.total = this.getTotalPriceOfModules();

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }
            });

            return PreviewProjectView;
        });
