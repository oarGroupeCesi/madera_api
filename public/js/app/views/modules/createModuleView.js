define(["backbone",
        "backbone.radio",
        "marionette",
        "jquery",
        "underscore",
        "i18n",
        "baseLayoutView",
        "models/module",
        "views/behaviors/validationBehavior",
        "views/elements_html/modal/modalLayoutView",
        "views/modules/renderModuleFormAfterSelectModuleTypeView",
        "views/modules/stepChoiceView",
        "hbs!/js/app/templates/modules/createModuleForm"],
        function (Backbone, Radio, Marionette, $, _, I18n,
                  BaseLayoutView,
                  ModuleModel,
                  ValidationBehavior,
                  ModalLayoutView, RenderModuleFormView, StepChoiceView,
                  CreateModuleFormTemplate) {
            "use strict";

            var CreateModuleView = BaseLayoutView.extend({
                template: CreateModuleFormTemplate,
                model : new ModuleModel(),

                behaviors: {
                    ValidationBehavior: {
                        behaviorClass: ValidationBehavior
                    }
                },

                events : {
                    'change .moduleNature'      : 'showModuleForm',
                    'submit form'               : 'handleModuleSave',
                    'mouseover .theTooltip'     : 'showTooltip',
                    'click #addAnotherModule'   : 'addAnotherModule',
                    'click .deleteModule'       : 'deleteModule',
                    'click .back'               : 'redirectToPreviousStep'
                },

                initialize: function (options) {
                    var that = this;

                    if(!options.modulesNatures || !options.productId) {
                        return false;
                    }

                    BaseLayoutView.prototype.initialize.apply(this, arguments);

                    this.channel = Radio.channel('Modules');

                    this.modulesNatures = options.modulesNatures;
                    this.productId = options.productId;

                    this.createStepChoiceModal = null;

                    this.render();
                },

                onShow : function () {
                    this.initFormValidation();
                },

                initFormValidation : function () {
                    this.trigger("ValidationBehavior:initFormValidation", {
                        formId : "#CreateModuleForm",
                        ignoreTitle : true,
                        focusInvalid: true,
                        ignore: '.ignore',
                        rules: {
                            'modulenature_id': {
                                required: true,
                                digits: true
                            },
                            'height': {
                                required: true,
                                digits: true
                            },
                            'weight': {
                                required: true,
                                digits: true
                            },
                            'quantity': {
                                required: true,
                                digits: true
                            }
                        }
                    });
                },

                handleModuleSave : function (e) {
                    $("#message").find('.alert').addClass("hide").empty();

                    e.preventDefault();

                    var that = this,
                        $form = $(e.currentTarget),
                        dataModule = [];

                    $('#modules .module-contain').each(function(index, divModule) {

                        dataModule[index] = {
                            'name' : ($(divModule).find("input[name='name']").val() != '')
                                        ? $(divModule).find("input[name='name']").val()
                                        : $(divModule).find("option[value='"+$(divModule).find("select[name='modulenature_id']").val()+"']").text(),
                            'height' : $(divModule).find("input[name='height']").val() || '',
                            'width' : $(divModule).find("input[name='width']").val(),
                            'quantity' : $(divModule).find("input[name='quantity']").val(),
                            'modulenature_id' : parseInt($(divModule).find("select[name='modulenature_id']").val()),
                            'product_id' : parseInt(that.productId)
                        };

                    });

                    $form.find('input, textarea, button, select').attr('disabled', 'disabled');

                    if(dataModule) {
                        that.channel
                            .request('saveModule', {'datas' : dataModule})
                            .then(function(response){
                                that.launchStepChoiceModal();
                            },
                            function(response){
                                that.showErrorMessage($form, 'Erreur : ' + response.responseJSON[0]);
                            });
                    }

                },

                launchStepChoiceModal: function () {
                    var that = this,
                        options = {
                            "title": "Faites votre choix",
                            "class": "step-choice",
                            "body": new StepChoiceView({
                                'model' : this.model
                            }),
                            "close": false,
                            "closeFooterButton": false
                        };

                    this.createStepChoiceModal = new ModalLayoutView(options);
                    this.createStepChoiceModal.showModal();
                    this.enableForm(this.$el.find('form'));
                },

                onDestroy : function () {
                    this.destroyModal();
                },

                destroyModal : function () {
                    if (this.createStepChoiceModal) {
                        this.createStepChoiceModal.closeModal();
                    }
                },

                addAnotherModule : function (e) {
                    e.preventDefault();

                    if(!this.getModulesOfProduct().length && !$('#modules .module-contain:last-child').find('.input-module-group').length) {
                        return false;
                    }

                    var $modulesContent = $('#modules-hidden').html(),
                        $test = $($modulesContent);

                    $('#modules').append($modulesContent);
                    $('#modules').find('.module-label > .number').last().text(
                        $('#modules .module-contain').length + this.getModulesOfProduct().length
                    );
                    $('.moduleInfos').last().empty();
                    $("body").animate({ scrollTop: $(document).height()}, 1600);
                },

                deleteModule : function (e) {
                    e.preventDefault();

                    $(e.currentTarget).parents('.module-contain').remove();
                },

                showModuleForm : function (e) {
                    e.preventDefault();

                    var moduleTypeId = $(e.currentTarget).val(),
                        selectedModuleType,
                        moduleInputsId = 'module_' + this.uniqueId();

                    selectedModuleType = this.modulesNatures.findWhere({id:parseInt(moduleTypeId)});

                    App.views.renderModuleFormView = new RenderModuleFormView({
                        options : selectedModuleType,
                        uniqueId : this.uniqueId() + '-' + this.uniqueId()
                    });

                    $(e.currentTarget).parents('.module-contain').find('.moduleInfos').attr('id', moduleInputsId);

                    this.addRegions({
                        'modules': $(e.currentTarget).parents('.module-contain').find('#'+moduleInputsId)
                    });

                    this.getRegion("modules").show(App.views.renderModuleFormView);
                },

                redirectToPreviousStep : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate(
                        "projects/edit/"+ this.model.id + "/step1/products/edit", {trigger:true}
                    );
                },

                showErrorMessage : function ($form, response) {
                    $form.find('.alert').fadeIn(600, function() {
                        $(this).addClass('alert-danger')
                        $(this).removeClass('alert-success hide')
                        $(this).html(response);
                    });
                    this.enableForm($form);
                },

                hideMessage : function(e) {
                    $(e.currentTarget).parents('form').find('.alert').fadeOut(600, function() {
                        $(this).addClass('hide');
                    });
                },

                enableForm : function($form) {
                    $form.find('input:not([readonly]), textarea, button, select:not(".readonly")').removeAttr('disabled');
                },

                uniqueId : function () {
                    return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                },

                getModulesOfProduct : function () {
                    return this.model.get('products').findWhere({id:this.productId}).get('modules');
                },

                serializeData : function () {
                    this.data.modulesNatures = this.modulesNatures.toJSON();
                    this.data.modules = this.getModulesOfProduct().toJSON();
                    this.data.numberOfModules = this.getModulesOfProduct().length + 1;

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseLayoutView.prototype.serializeData.apply(this, arguments));
                }
            });

            return CreateModuleView;
        });
