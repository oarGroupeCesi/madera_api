 define(["backbone",
        "backbone.radio",
        "marionette",
        "jquery",
        "models/range",
        "models/project",
        "collections/ranges",
        "collections/modules",
        "collections/modulesNatures",
        "collections/customers",
        "collections/products",
        "collections/projects",
        "controllers/objects/projectsObject",
        "controllers/objects/customersObject",
        "controllers/objects/productsObject",
        "controllers/objects/rangesObject",
        "controllers/objects/modulesObject",
        "controllers/objects/modulesNaturesObject",
        "views/projects/projectWrapperLayoutView",
        "views/projects/createProjectView",
        "views/projects/headerProjectView",
        "views/projects/displayProjectView",
        "views/projects/footerProjectView",
        "views/projects/previewProjectView",
        "views/products/createProductView",
        "views/modules/createModuleView"],
    function (Backbone, Radio, Marionette, $,
            RangeModel, ProjectModel,
            RangesCollection, ModulesCollection, ModulesNaturesCollection, CustomersCollection, ProductsCollection, ProjectsCollection,
            ProjectsObject, CustomersObject, ProductsObject, RangesObject, ModulesObject, ModulesNaturesObject,
            ProjectWrapperLayoutView, CreateProjectView, HeaderProjectView, DisplayProjectView,
            FooterProjectView, PreviewProjectView, CreateProductView, CreateModuleView) {
        "use strict";

        var ProjectsController = Marionette.Controller.extend({

            initialize : function () {
                this.projectsObject = new ProjectsObject();
                this.channel = Radio.channel('Projects');
            },

            addProject : function () {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'creationProjet']);

                this.projectId = null;

                this.initProject({
                    step : "step1"
                });
            },

            editProject : function (projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'editionProjet']);

                this.projectId = parseInt(projectId);

                this.initProject({
                    step : "step1"
                });
            },

            viewProject : function (projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'vueProjet']);

                var that = this;
                this.projectId = parseInt(projectId);

                this.channel.request("getProject", this.projectId)
                    .then(function(projectModel) {
                        App.views.viewProjectView = new DisplayProjectView({
                            'model' : new ProjectModel(projectModel)
                        });
                        App.views.appLayoutView.getRegion('content').show(App.views.viewProjectView);
                    }, function() {
                        that.redirectToHome();
                    });
            },


            addProductsToProject : function (projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'creationProduits']);

                this.projectId = parseInt(projectId);

                this.initProject({
                    step : "step2"
                });
            },

            addModulesToProductOfProject : function (projectId, productId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'creationModules']);

                this.projectId = parseInt(projectId);
                this.productId = parseInt(productId);

                this.initProject({
                    step : "step3"
                });
            },

            previewCustomerProject : function(projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'apercuProjetFinal']);

                this.projectId = parseInt(projectId);

                this.initProject({
                    step : "step4"
                });
            },

            initLayoutAndInitObject : function() {
                App.views.projectWrapperLayoutView = new ProjectWrapperLayoutView();
                if(App.views.projectWrapperLayoutView) {
                    App.views.appLayoutView.getRegion('content').show(App.views.projectWrapperLayoutView);
                }

                this.customersObject = new CustomersObject();
                this.productsObject = new ProductsObject();
                this.rangesObject = new RangesObject();
                this.modulesObject = new ModulesObject();
                this.modulesNaturesObject = new ModulesNaturesObject();
            },

            redirectToHome : function () {
                Backbone.history.navigate('home', {trigger:true});
            },

            initProject : function (options) {
                this.initLayoutAndInitObject();

                if (options.step) {
                    switch(options.step) {
                        case 'step1' : {
                            var that = this;

                            this.customerChannel = Radio.channel('Customers');
                            this.customerChannel
                                .request('getCustomers')
                                .then(function (customersCollection){
                                    that.customersCollection = new CustomersCollection(customersCollection);

                                    App.views.headerProjectView = new HeaderProjectView({
                                        'title' : 'Etape 1 : Identification du projet'
                                    });
                                    App.views.projectWrapperLayoutView.getRegion('projectHeader').show(App.views.headerProjectView);

                                    console.log('in', that.projectId);

                                    that.channel
                                        .request('getProject', that.projectId)
                                        .then(function(project){
                                            console.log('toto', project);
                                            that.projectModel = (project.id) ? new ProjectModel(project) : new ProjectModel();

                                            console.log('projectModel', that.projectModel);

                                            App.views.stepView = new CreateProjectView({
                                                'customers' : that.customersCollection,
                                                'model'     : that.projectModel
                                            });
                                            App.views.projectWrapperLayoutView.getRegion('projectContent').show(App.views.stepView);
                                    });

                            });

                            break;
                        }

                        case 'step2' : {
                            var that = this;

                            this.rangeChannel = Radio.channel('Ranges');
                            this.rangeChannel
                                .request('getRanges')
                                .then(function (rangesCollection){
                                    that.rangesCollection = new RangesCollection(rangesCollection);

                                    App.views.headerProjectView = new HeaderProjectView({
                                        'title' : 'Etape 2 : Conception de produit(s)'
                                    });
                                    App.views.projectWrapperLayoutView.getRegion('projectHeader').show(App.views.headerProjectView);

                                    that.channel
                                        .request('getProject', that.projectId)
                                        .then(function(project){
                                            that.projectModel = (project.id) ? new ProjectModel(project) : new ProjectModel();

                                            App.views.stepView = new CreateProductView({
                                                'templateRanges'    : that.rangesCollection.getTemplateRanges(),
                                                'model'             : that.projectModel
                                            });
                                            App.views.projectWrapperLayoutView.getRegion('projectContent').show(App.views.stepView);
                                    });
                            });

                            break;
                        }

                        case 'step3' : {
                            var that = this;

                            this.modulesNaturesChannel = Radio.channel('ModulesNatures');
                            this.modulesNaturesChannel
                                .request('getModulesNatures')
                                .then(function (modulesNatures){
                                    that.modulesNaturesCollection = new ModulesNaturesCollection(modulesNatures);

                                    App.views.headerProjectView = new HeaderProjectView({
                                        'title' : 'Etape 3 : Conception de module(s)'
                                    });
                                    App.views.projectWrapperLayoutView.getRegion('projectHeader').show(App.views.headerProjectView);

                                    that.channel
                                        .request('getProject', that.projectId)
                                        .then(function(project){
                                            that.projectModel = (project.id) ? new ProjectModel(project) : new ProjectModel();

                                            App.views.stepView = new CreateModuleView({
                                                'modulesNatures'    : that.modulesNaturesCollection,
                                                'model'             : that.projectModel,
                                                'productId'         : that.productId
                                            });
                                            App.views.projectWrapperLayoutView.getRegion('projectContent').show(App.views.stepView);
                                    });
                                });

                            break;
                        }

                        case 'step4' : {
                            var that = this;

                            this.channel.request('getProject', this.projectId)
                                .then(function(projectModel) {

                                    App.views.headerProjectView = new HeaderProjectView({
                                        'title' : 'Aperçu du devis final'
                                    });
                                    App.views.projectWrapperLayoutView.getRegion('projectHeader').show(App.views.headerProjectView);

                                    that.channel
                                        .request('getProject', that.projectId)
                                        .then(function(project){
                                            that.projectModel = new ProjectModel(project);

                                            App.views.stepView = new PreviewProjectView({
                                                'model' : that.projectModel
                                            });
                                            App.views.projectWrapperLayoutView.getRegion('projectContent').show(App.views.stepView);
                                    });
                                });

                            break;
                        }

                        default:
                            break;
                    }
                }

            }
        });

        return ProjectsController;
    });
