define([
    'backbone',
    'underscore',
    'marionette',
    'moment',
    'i18n',
    'i18nXHR',
    'controllers/usersController',
    'controllers/pagesController',
    'controllers/projectsController',
    'views/headerView',
    'views/appLayoutView'
], function (Backbone, _, Marionette, Moment, i18n, i18nXHR,
             UsersController, PagesController, ProjectsController,
             HeaderView, AppLayoutView) {
    "use strict";

    var initialize = function initialize() {
        window.App = (window.App) || new Marionette.Application();

        App.addRegions({
            "mainRegion": "#main-wrapper"
        });

        App.check_session = false;

        App.controllers = {};
        App.views = {};
        App.config = {};

        App.controllers.usersController = new UsersController();
        App.controllers.pagesController = new PagesController();
        App.controllers.projectsController = new ProjectsController();

        App.views.appLayoutView = new AppLayoutView();
        App.mainRegion.show(App.views.appLayoutView);

        App.router = new Marionette.AppRouter();

        App.config.lang = 'fr';

        Moment.locale(App.config.lang);

        i18n
        .use(i18nXHR)
        .init({
            "fallbackLng" : App.config.lang,
            "defaultNS" : "translation",
            "ns" : [ "translation" ],
            "backend" : {
                "loadPath" : "/js/locales/{{lng}}/{{ns}}.json"
            },
            "trigger" : "i18n:file:loaded"
        }, function () {
            App.start();
        });

        App.on("start", function() {
            App.views.appLayoutView.getRegion('header').show(new HeaderView());

            this.initialized = false;

            App.router.processAppRoutes(App.controllers.usersController, {
                ""          : "index",
                "logout"    : "logout"
            });

            App.router.processAppRoutes(App.controllers.pagesController, {
                "home": "index"
            });

            App.router.onRoute = function (name, path, args) {
                if (App.initialized) {
                    App.controllers.usersController.trigger('App:usersController:checkLogin');
                }
            };

            App.router.processAppRoutes(App.controllers.projectsController, {
                "projects/create"                                                   : "addProject",
                "projects/edit/:projectId"                                          : "editProject",
                "projects/edit/:projectId/step1/products/edit"                      : "addProductsToProject",
                "projects/edit/:projectId/step2/product/:productId/modules/edit"    : "addModulesToProductOfProject",
                "projects/edit/:projectId/step3/preview"                            : "previewCustomerProject",
                "projects/:projectId"                                               : "viewProject"
            });

            if (Backbone.history) {
                Backbone.history.start();
                App.trigger("backbone:history:start");

                App.trigger('ajax:setTokenHeaders');

                var token = localStorage.getItem('token');

                if (token) {
                    App.check_session = true;
                    if(App.check_session) {
                        if (Backbone.history.fragment === "") {
                            Backbone.history.navigate("home", {trigger: true});
                        }
                    } else {
                        localStorage.removeItem('token');
                        Backbone.history.navigate("", {trigger: true});
                    }
                } else {
                    Backbone.history.navigate("", {trigger: true});
                }

                this.initialized = true;
            }
        });

        App.on('ajax:setTokenHeaders', function() {
            $.ajaxSetup({
                beforeSend: function (xhr, type) {
                    var token = localStorage.getItem('token');
                    if (token) {
                        xhr.setRequestHeader("Accept", "application/json");
                        xhr.setRequestHeader("Authorization", "Bearer " + token);
                    }
                }
            });
        });

    };

    return {
        initialize: initialize
    };
});