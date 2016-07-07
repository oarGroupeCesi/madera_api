define(["marionette",
        "underscore",
        "backbone.radio",
        "collections/products",
        "models/product"],
    function (Marionette, _, Radio, ProductsCollection, ProductModel) {
        "use strict";

        var ProductObject = Marionette.Object.extend({
            productId : null,

            initialize : function () {
                this.channel = Radio.channel('Products');

                this.channel.reply('getProducts', this.getProducts.bind(this));
                this.channel.reply('getProduct', this.getProduct.bind(this));
                this.channel.reply('saveProduct', this.saveProduct.bind(this));
                this.channel.reply('deleteProduct', this.deleteProduct.bind(this));
            },

            getProducts : function () {
                var products = new ProductsCollection();

                App.trigger('ajax:setTokenHeaders');

                return products.fetch();
            },

            getProduct : function (projectId) {
                var products = new ProductsCollection();

                App.trigger('ajax:setTokenHeaders');

                return products.fetch({
                    'project_id' : projectId
                });
            },

            saveProduct : function (data) {
                var productModel = new ProductModel(data);

                if (!data) {
                    return;
                }

                App.trigger('ajax:setTokenHeaders');

                return productModel.save();
            },

            deleteProduct : function(product, options) {
                var deferred = new $.Deferred(),
                    defaults = {
                        wait: true,
                        success : function (model, response) {
                            deferred.resolve(model, response);
                        },
                        error : function (model, response) {
                            deferred.reject(model, response);
                        }
                    },
                    options = $.extend({}, defaults, options);

                product.destroy(options);

                return deferred.promise();
            }
        });

        return ProductObject;
    });
