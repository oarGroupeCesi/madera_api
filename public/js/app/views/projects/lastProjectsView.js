define(["backbone",
        "marionette",
        "jquery",
        "underscore",
        "baseItemView",
        "hbs!/js/app/templates/projects/lastProjects"],
        function (Backbone, Marionette, $, _, BaseItemView, LastProjectsTemplate) {

            "use strict";

            var LastProjectsView = BaseItemView.extend({
                template: LastProjectsTemplate,

                initialize: function (options) {
                    BaseItemView.prototype.initialize.apply(this, arguments);

                    this.lastProjects = options.lastProjects;

                    console.log('options', options);

                    this.render();
                },

                serializeData : function () {
                    this.data.lastProjects = this.lastProjects.toJSON();

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }
            });

            return LastProjectsView;
        });
