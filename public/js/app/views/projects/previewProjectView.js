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
                model : new ProjectModel(),
                
                events : {
                    'click #validateProject' : 'validateProject'
                },
                
                initialize: function (options) {
                    var that = this;
                    
                    BaseItemView.prototype.initialize.apply(this, arguments);

                    this.channel = Radio.channel('Projects');
                    
                    console.log(options);

                    this.project = options.project || {};
                    this.projectId = options.projectId;
                    this.modulesCollection = options.modules || {};
                    this.productsCollection = options.products || {};
                    this.rangeModel = options.range || {};

                    this.render();
                },

                onBeforeRender : function () {
                    var that = this,
                        totalModule = 0;
                    this.data.modules = this.modulesCollection.toJSON();
                    this.data.product = this.productsCollection.toJSON();
                    this.data.range = this.rangeModel.toJSON();

                    for(var i = 0; i < this.data.modules.length; i++) {
                        totalModule += this.data.modules[i].quantity * this.data.modules[i].moduleNature.price;
                    }

                    this.data.total = totalModule;
                },

                validateProject : function (e) {                  
                    e.preventDefault();
                    
                    var that = this;    
                        
                    this.project.set('status', 'pending');
                    
                    that.channel
                        .request('saveProject', this.project)
                        .then(function(projectModel){
                            that.model = new ProjectModel(projectModel);
                            Backbone.history.navigate("home", {trigger:true});
                        });
                }
            });

            return PreviewProjectView;
        });
