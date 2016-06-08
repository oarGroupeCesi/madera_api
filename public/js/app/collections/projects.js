define(["backbone",
        "models/project"],
    function (Backbone, ProjectModel) {
        "use strict";

        var ProjectsCollection = Backbone.Collection.extend({
            model: ProjectModel,
            url: function () {
                return "/api/project";
            }
        });

        return ProjectsCollection;
    });
