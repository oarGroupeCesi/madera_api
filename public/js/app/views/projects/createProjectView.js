define(["backbone",
        "backbone.radio",
        "marionette",
        "jquery",
        "underscore",
        "baseItemView",
        "views/behaviors/validationBehavior",
        "models/project",
        "models/customer",
        "hbs!/js/app/templates/projects/createProjectForm"],
        function (Backbone, Radio, Marionette, $, _,
                  BaseItemView,
                  ValidationBehavior,
                  ProjectModel, CustomerModel,
                  CreateProjectFormTemplate) {
            "use strict";

            var CreateProjectView = BaseItemView.extend({
                template: CreateProjectFormTemplate,

                behaviors: {
                    ValidationBehavior: {
                        behaviorClass: ValidationBehavior
                    }
                },

                events : {
                    'submit form'                           : 'handleProjectSave',
                    'click input[name="customer_choice"]'   : 'showCustomerForm',
                    'click .next'                           : 'redirectToNextStep'
                },

                initialize: function (options) {
                    var that = this;

                    BaseItemView.prototype.initialize.apply(this, arguments);

                    this.channel = Radio.channel('Projects');
                    this.customerChannel = Radio.channel('Customers');

                    this.customersCollection = options.customers || {};

                    this.render();
                },

                onShow : function () {
                    this.initFormValidation();
                },

                onDestroy : function () {
                    this.channel.off();
                },

                initFormValidation : function (custumerRadio) {
                    var options = {
                        formId : "#CreateProjectForm",
                        ignoreTitle : true,
                        focusInvalid: true,
                        ignore: '.ignore',
                        rules: {
                            'name': {
                                required: true
                            },
                            'customer_choice': {
                                required: true
                            }
                        }
                    }

                    this.trigger("ValidationBehavior:initFormValidation", options);
                },

                showCustomerForm : function (e) {
                    switch ($(e.currentTarget).val()) {
                        case 'newCustomer' :
                            $('#newCustomerForm').removeClass('hidden');
                            $('#oldCustomerForm').addClass('hidden');
                            break;

                        case 'oldCustomer' :
                            $('#oldCustomerForm').removeClass('hidden');
                            $('#newCustomerForm').addClass('hidden');
                            break;
                    }
                },

                handleProjectSave : function (e) {
                    $("#message").find('.alert').addClass("hide").empty();

                    e.preventDefault();

                    var that = this,
                        $form = $(e.currentTarget),
                        dataCustomer = {},
                        dataProject = {};

                    $form.find('input, textarea, button, select').attr('disabled', 'disabled');

                    if(this.model.id) {
                        dataProject.id = this.model.id;
                        dataProject.user_id = this.model.get('user_id');
                    }

                    dataProject.name = $form.find('#name').val();

                    if($('input[name="customer_choice"]:checked').val() == 'newCustomer') {
                        dataCustomer = {
                            'firstname' : $form.find('#firstname').val(),
                            'lastname' : $form.find('#lastname').val(),
                            'email' : $form.find('#email').val(),
                            'adr_street' : $form.find('#adr_street').val(),
                            'adr_zipcode' : $form.find('#adr_zipcode').val(),
                            'adr_city' : $form.find('#adr_city').val()
                        };

                        this.customerChannel
                            .request('saveCustomer', dataCustomer)
                            .then(function(customerModel){
                                that.customerModel = new CustomerModel(customerModel);
                                dataProject.customer_id = that.customerModel.get('id');

                                that.channel
                                    .request('saveProject', dataProject)
                                    .then(function(projectModel){
                                        that.model = new ProjectModel(projectModel);
                                        Backbone.history.navigate("projects/edit/" + that.model.id + "/step1/products/edit", {trigger:true});
                                    });
                            },
                            function(response){
                                $form.find('.alert').text('Erreur : ' + response.responseJSON[0]).removeClass('hide');
                                $form.find('input, textarea, button, select').attr('disabled', false);
                            });
                    } else {
                        dataCustomer = {
                            'id' : $form.find('#customer_id').val()
                        };

                        dataProject.customer_id = dataCustomer.id;

                        that.channel.request('saveProject', dataProject)
                            .then(function(projectModel){
                                that.model = new ProjectModel(projectModel);
                                Backbone.history.navigate("projects/edit/" + that.model.id + "/step1/products/edit", {trigger:true});
                            },
                            function(response){
                                $form.find('.alert').text('Erreur : ' + response.responseJSON[0]).removeClass('hide');
                                $form.find('input, textarea, button, select').attr('disabled', false);
                            });
                    }

                },

                redirectToNextStep : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate("projects/edit/"+this.model.id+"/step1/products/edit" , {trigger:true});
                },

                serializeData : function () {
                    this.data.customers = this.customersCollection.toJSON();

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseItemView.prototype.serializeData.apply(this, arguments));
                }
            });

            return CreateProjectView;
        });
