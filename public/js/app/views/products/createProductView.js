define(["backbone",
        "backbone.radio",
        "marionette",
        "jquery",
        "underscore",
        "baseLayoutView",
        "views/behaviors/validationBehavior",
        "views/elements_html/list-group-collapse/collapseView",
        "models/project",
        "models/product",
        "models/range",
        "hbs!/js/app/templates/products/createProductForm"],
        function (Backbone, Radio, Marionette, $, _,
                  BaseLayoutView,
                  ValidationBehavior, CollapseView,
                  ProjectModel, ProductModel, RangeModel,
                  CreateProductFormTemplate) {
            "use strict";

            var CreateProductView = BaseLayoutView.extend({
                template: CreateProductFormTemplate,

                behaviors: {
                    ValidationBehavior: {
                        behaviorClass: ValidationBehavior
                    }
                },

                events : {
                    'change .templateRanges'    : 'showCollapsableTab',
                    'submit form'               : 'handleProductSave',
                    'click .back'               : 'redirectToPreviousStep',
                    'click .next'               : 'redirectToNextStep'
                },

                initialize: function (options) {
                    if(!options.templateRanges) {
                        return false;
                    }

                    BaseLayoutView.prototype.initialize.apply(this, arguments);

                    this.channel = Radio.channel('Products');
                    this.rangeChannel = Radio.channel('Ranges');

                    this.templateRanges = options.templateRanges;

                    this.render();
                },

                onShow : function () {
                    this.initFormValidation();
                    this.$el.find('[data-toggle="tooltip"]').tooltip();
                },

                initFormValidation : function () {
                    this.trigger("ValidationBehavior:initFormValidation", {
                        formId : "#CreateProductForm",
                        ignoreTitle : true,
                        focusInvalid: true,
                        ignore: '.ignore',
                        rules: {
                            'range_id' : {
                                required: true
                            },
                            'product_name': {
                                required: true
                            }
                        },
                        messages: {
                            'range_id' : {
                                required: "Erreur : Vous devez sélectionner un modèle de gamme."
                            }
                        }
                    });
                },

                handleProductSave : function (e) {
                    $("#message").find('.alert').addClass("hide").empty();

                    e.preventDefault();

                    var that = this,
                        $form = $(e.currentTarget),
                        datas = {
                            'dataProduct' : [],
                            'dataRange' : []
                        };

                    if ($form.valid()) {

                        $('#products .product-contain').each(function(index, divProduct) {
                            datas.dataProduct[index] = {
                                'name' : $(divProduct).find("input[name='product_name']").val(),
                                'project_id' : parseInt(that.model.id)
                            };

                            datas.dataRange[index] = {
                                'name' : $(divProduct).find("input[name='product_name']").val(),
                                'exterior_finish' : $(divProduct).find("select[name='exterior_finish']").val(),
                                'insulating' : $(divProduct).find("select[name='insulating']").val(),
                                'top' : $(divProduct).find("select[name='top']").val(),
                                'configuration' : $(divProduct).find("select[name='configuration']").val(),
                                'template' : 0
                            };
                        });

                        $form.find('input, textarea, button, select').attr('disabled', 'disabled');

                        if(datas.dataRange.length && datas.dataProduct.length) {
                            $.each(datas.dataRange, function(i, dataRange){
                                that.rangeChannel
                                    .request('saveRange', dataRange)
                                    .then(function(rangeModel){
                                        that.rangeModel = new RangeModel(rangeModel);
                                        datas.dataProduct[i].range_id = parseInt(that.rangeModel.get('id'));

                                        that.channel
                                            .request('saveProduct', datas.dataProduct[i])
                                            .then(function(productModel){
                                                that.productModel = new ProductModel(productModel);
                                                Backbone.history.navigate(
                                                    "projects/edit/"
                                                    + that.model.id
                                                    + "/step2/product/"
                                                    + that.productModel.id
                                                    + "/modules/edit",
                                                    {trigger:true}
                                                );
                                            },
                                            function(response){
                                                that.showErrorMessage('Erreur : ' + response.responseJSON[0]);
                                            });
                                    },
                                    function(response){
                                        that.showErrorMessage('Erreur : ' + response.responseJSON[0]);
                                    });
                            });
                        }
                    }
                },

                redirectToPreviousStep : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate("projects/edit/"+ this.model.id, {trigger:true});
                },

                redirectToNextStep : function (e) {
                    e.preventDefault();

                    var $btn = $(e.currentTarget),
                        productId = $btn.data('product-id');

                    Backbone.history.navigate(
                        "projects/edit/"+this.model.id+"/step2/product/"+productId+"/modules/edit",
                        {trigger:true}
                    );
                },

                showCollapsableTab : function (e) {
                    e.preventDefault();

                    var rangeId = $(e.currentTarget).val(),
                        selectedRange,
                        rangePanelId = 'range_' + this.uniqueId();

                    selectedRange = this.templateRanges.findWhere({id:parseInt(rangeId)});

                    var collapseView = new CollapseView({
                        options : selectedRange,
                        collapseId : "listGroupRangeCollapse",
                        uniqueId : this.uniqueId() + '_' + this.uniqueId()
                    });

                    $(e.currentTarget).parents('.product-contain').find('.rangePanel').attr('id', rangePanelId);

                    this.addRegions({
                        listProduct: '#'+rangePanelId
                    });

                    this.showChildView('listProduct', collapseView);
                },

                showSuccessMessage : function(successMessage) {
                    var $form = this.$el.find('form');

                    this.enableForm();

                    $('html, body').animate({scrollTop : 0}, 500);

                    $form.find('.alert').fadeIn(600, function() {
                        $(this).addClass('alert-success')
                        $(this).removeClass('alert-danger hide')
                        $(this).html(successMessage);
                    });
                },

                showErrorMessage : function (response) {
                    var $form = this.$el.find('form');

                    this.enableForm();

                    $form.find('.alert').fadeIn(600, function() {
                        $(this).addClass('alert-danger')
                        $(this).removeClass('alert-success hide')
                        $(this).html(response);
                    });
                },

                hideMessage : function(e) {
                    $(e.currentTarget).parents('form').find('.alert').fadeOut(600, function() {
                        $(this).addClass('hide');
                    });
                },

                enableForm : function() {
                    var $form = this.$el.find('form');

                    $form.find('input, textarea, button, select').removeAttr('disabled');
                },

                uniqueId : function () {
                    return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
                },

                serializeData : function () {
                    this.data.templateRanges = this.templateRanges.toJSON();
                    this.data.products = this.model.get('products').toJSON();
                    this.data.numberOfProducts = this.model.get('products').length + 1;

                    var viewData = {data: this.data};
                    return _.extend(viewData, BaseLayoutView.prototype.serializeData.apply(this, arguments));
                }
            });

            return CreateProductView;
        });
