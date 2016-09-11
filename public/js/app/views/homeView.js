define(["backbone",
        "marionette",
        "jquery",
        "underscore",
        "baseLayoutView",
        "views/elements_html/modal/modalLayoutView",
        "views/projects/lastProjectsView",
        "collections/projects",
        "hbs!/js/app/templates/home",
        "hbs!/js/app/templates/help/homeHelp"],
        function (Backbone, Marionette, $, _,
            BaseLayoutView, ModalLayoutView, LastProjectsView,
            ProjectsCollection,
            HomeTemplate, HomeHelpTemplate) {

            "use strict";

            var HomeView = BaseLayoutView.extend({
                template: HomeTemplate,

                events: {
                    'click #create_project' : 'navigateToCreateProjectView',
                    'change #search-devis'  : 'searchProject',
                    'keyup #search-devis'   : 'searchProject',
                    'input #search-devis'   : 'searchProject',
                    'click .btn-info'       : 'showInfoModal'
                },

                regions : {
                    'lastProjects' : '#lastProjects'
                },

                initialize: function (params) {
                    BaseLayoutView.prototype.initialize.apply(this, arguments);

                    this.projects = (params.projects) ? params.projects : {};
                    this.lastProjects = this.projects;
                    this.finalProjects = this.getLastProjects();
                    this.helpModal = null;
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

                onDestroy : function () {
                    this.destroyModal();
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
                                if(attr === 'id' && !isNaN(searchValue)) {
                                    return ~val.toString().search(new RegExp(searchValue, "i"));
                                } else if (attr === 'name') {
                                    return ~val.search(new RegExp(searchValue, "i"));
                                }
                            });
                        });
                    } else {
                        lastProjects = this.lastProjects;
                    }

                    return new ProjectsCollection(lastProjects.slice(0, 6));
                },

                showInfoModal : function (e) {
                    e.preventDefault();

                    var that = this,
                        options = {
                            "title"                 : "Aide",
                            "class"                 : "help",
                            "body"                  : HomeHelpTemplate,
                            "close"                 : true,
                            "closeFooterButton"     : true
                        };

                    this.helpModal = new ModalLayoutView(options);
                    this.helpModal.showModal();
                },

                destroyModal : function () {
                    if (this.helpModal) {
                        this.helpModal.closeModal();
                    }
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
