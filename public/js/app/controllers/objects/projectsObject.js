define(["marionette",
        "underscore",
        "backbone.radio",
        "collections/projects",
        "models/project"],
    function (Marionette, _, Radio, ProjectsCollection, ProjectModel) {
        "use strict";

        var ProjectObject = Marionette.Object.extend({
            projectId : null,

            initialize : function () {
                this.channel = Radio.channel('Projects');

                this.channel.reply('getProjects', this.getProjects.bind(this));
                this.channel.reply('getProject', this.getProject.bind(this));
                this.channel.reply('saveProject', this.saveProject.bind(this));
                this.channel.reply('deleteProject', this.deleteProject.bind(this));
            },

            getProjects : function () {
                var projects = new ProjectsCollection();

                App.trigger('ajax:setTokenHeaders');

                return projects.fetch();
            },

            getProject : function (id) {
                var project = new ProjectModel();

                App.trigger('ajax:setTokenHeaders');

                project.set('id', id);

                return project.fetch();
            },

            saveProject : function (data) {
                var projectModel = new ProjectModel(data);

                if (!data) {
                    return;
                }

                App.trigger('ajax:setTokenHeaders');

                return projectModel.save();
            },

            deleteProject : function(project, options) {
                var deferred = new $.Deferred(),
                    defaults = {
                        wait: true,
                        success : function (model, response) {
                            deferred.resolve(model, response);
                        },
                        error : function (model, response) {
                            deferred.reject(model, response);
                        }
                    },
                    options = $.extend({}, defaults, options);

                project.destroy(options);

                return deferred.promise();
            }
        });

        return ProjectObject;
    });
