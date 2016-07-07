define(["backbone",
        "marionette",
        "jquery",
        "underscore",
        "baseLayoutView",
        "views/projects/lastProjectsView",
        "collections/projects",
        "hbs!/js/app/templates/home"],
        function (Backbone, Marionette, $, _,
            BaseLayoutView, LastProjectsView,
            ProjectsCollection,
            HomeTemplate) {

            "use strict";

            var HomeView = BaseLayoutView.extend({
                template: HomeTemplate,

                events: {
                    'click #create_project' : 'navigateToCreateProjectView',
                    'change #search-devis'  : 'searchProject',
                    'keyup #search-devis'   : 'searchProject',
                    'input #search-devis'   : 'searchProject'
                },

                regions : {
                    'lastProjects' : '#lastProjects'
                },

                initialize: function (params) {
                    BaseLayoutView.prototype.initialize.apply(this, arguments);

                    this.projects = (params.projects) ? params.projects : {};
                    this.lastProjects = this.projects;
                    this.finalProjects = this.getLastProjects();

                    this.render();
                },

                onShow : function () {
                    if(this.$el.find('#lastProjects').length) {
                        this.lastProjectsView = new LastProjectsView({
                            lastProjects : this.finalProjects
                        });

                        this.showChildView('lastProjects', this.lastProjectsView);
                    }
                },

                searchProject : function (e) {
                    var $input = $(e.currentTarget),
                        searchValue = $input.val();

                    this.finalProjects = this.getLastProjects(searchValue);

                    if(this.$el.find('#lastProjects').length) {
                        this.lastProjectsView = new LastProjectsView({
                            lastProjects : this.finalProjects
                        });

                        this.showChildView('lastProjects', this.lastProjectsView);
                    }
                },

                navigateToCreateProjectView : function (e) {
                    e.preventDefault();
                    Backbone.history.navigate('/projects/create', {trigger:true});
                },

                getLastProjects : function (searchValue) {
                    var lastProjects;

                    if(searchValue && searchValue != "undefined") {
                        lastProjects = this.lastProjects.filter(function(project) {
                            return _.any(project.attributes, function(val, attr) {
                                if(attr === 'name') {
                                    return ~val.indexOf(searchValue);
                                }
                            });
                        });
                    } else {
                        lastProjects = this.lastProjects;
                    }

                    return new ProjectsCollection(lastProjects.slice(0, 6));
                },

                serializeData : function () {
                    this.data.projects = this.projects.toJSON();
                    this.data.numberOfProjects = this.projects.length;
                    this.data.lastProjects = this.finalProjects.toJSON();

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseLayoutView.prototype.serializeData.apply(this, arguments));
                }
            });

            return HomeView;
        });
