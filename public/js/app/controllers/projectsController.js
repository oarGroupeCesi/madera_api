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
        "views/projects/footerProjectView",
        "views/projects/previewProjectView",
        "views/products/createProductView",
        "views/modules/createModuleView"],
    function (Backbone, Radio, Marionette, $, 
            RangeModel, ProjectModel, 
            RangesCollection, ModulesCollection, ModulesNaturesCollection, CustomersCollection, ProductsCollection, ProjectsCollection, 
            ProjectsObject, CustomersObject, ProductsObject, RangesObject, ModulesObject, ModulesNaturesObject, 
            ProjectWrapperLayoutView, CreateProjectView, HeaderProjectView, FooterProjectView, PreviewProjectView, CreateProductView, CreateModuleView) {
        "use strict";

        var ProjectsController = Marionette.Controller.extend({
            
            addProject : function () {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'creationProjet']);
            
                this.initProject({
                    step : "step1"
                });
            },

            viewProject : function (projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'vueProjet']);
            
                this.projectId = projectId;

                App.views.viewProjectView = new ViewProjectView();
                App.views.appLayoutView.getRegion('content').show(App.views.viewProjectView);
            },


            addProductsToProject : function (projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'creationProduits']);
            
                this.projectId = projectId;

                this.initProject({
                    step : "step2"
                });
            },

            addModulesToProject : function (projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'creationModules']);
            
                this.projectId = projectId;

                this.initProject({
                    step : "step3"
                });
            },

            previewCustomerProject : function(projectId) {
                App.views.appLayoutView.setBodyClass(['headerEdition', 'apercuProjetFini']);
            
                this.projectId = projectId;

                this.initProject({
                    step : "step4"
                });
            },

            initLayoutAndInitObject : function() {
                App.views.projectWrapperLayoutView = new ProjectWrapperLayoutView();
                App.views.appLayoutView.getRegion('content').show(App.views.projectWrapperLayoutView);

                this.projectsObject = new ProjectsObject();
                this.customersObject = new CustomersObject();
                this.productsObject = new ProductsObject();
                this.rangesObject = new RangesObject();
                this.modulesObject = new ModulesObject();
                this.modulesNaturesObject = new ModulesNaturesObject();
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
                                    App.views.stepView = new CreateProjectView({
                                        'customers' : that.customersCollection
                                    });                            
                                    App.views.projectWrapperLayoutView.getRegion('projectContent').show(App.views.stepView);
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
                                    App.views.stepView = new CreateProductView({
                                        'projectId' : that.projectId,
                                        'templateRanges' : that.rangesCollection.getTemplateRanges()
                                    });
                                    App.views.projectWrapperLayoutView.getRegion('projectContent').show(App.views.stepView);
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
                                    App.views.stepView = new CreateModuleView({
                                        'projectId' : that.projectId,
                                        'modulesNatures' : that.modulesNaturesCollection
                                    });
                                    App.views.projectWrapperLayoutView.getRegion('projectContent').show(App.views.stepView);
                                });

                            break;
                        }

                        case 'step4' : {
                            var that = this;

                            this.modulesNaturesChannel = Radio.channel('ModulesNatures');
                            this.modulesChannel = Radio.channel('Modules');
                            this.productsChannel = Radio.channel('Products');
                            this.rangeChannel = Radio.channel('Ranges');
                            this.projectChannel = Radio.channel('Projects');


                            $.when( that.modulesChannel.request('getModule', that.projectId), 
                                    that.productsChannel.request('getProduct', that.projectId))
                                .then(function(modulesCollection, productsCollection) {

                                    that.modulesCollection = new ModulesCollection(modulesCollection[0]);
                                    that.productsCollection = new ProductsCollection(productsCollection[0]);
                                    that.productModel = that.productsCollection.first();

                                    $.when( that.rangeChannel.request('getRanges'), 
                                            that.modulesNaturesChannel.request('getModulesNatures'),
                                            that.projectChannel.request('getProjects'))
                                        .then(function(rangeCollection, modulesNaturesCollection, projectsCollection) {

                                            that.rangeCollection = new RangesCollection(rangeCollection[0]);
                                            that.projectsCollection = new ProjectsCollection(projectsCollection[0]);
                                            that.rangeModel = that.rangeCollection.findWhere({id: that.productModel.get('range_id')});
                                            that.projectModel = that.projectsCollection.findWhere({id: parseInt(that.projectId)});
                                            that.modulesNaturesCollection = new ModulesNaturesCollection(modulesNaturesCollection[0]);
                                            that.modulesCollection.each(function(module) {
                                                module.set('moduleNature', that.modulesNaturesCollection.findWhere({id: module.get('modulenature_id')}));
                                            });

                                            App.views.headerProjectView = new HeaderProjectView({
                                                'title' : 'Aperçu du devis final'
                                            });
                                            App.views.projectWrapperLayoutView.getRegion('projectHeader').show(App.views.headerProjectView);
                                            App.views.stepView = new PreviewProjectView({
                                                'project' : that.projectModel,
                                                'projectId' : that.projectId,
                                                'modules' : that.modulesCollection,
                                                'products' : that.productsCollection,
                                                'range' : that.rangeModel
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
