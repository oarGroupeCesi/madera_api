define(["backbone",
        "collections/products"],
    function (Backbone, ProductsCollection) {
        "use strict";

        var Project = Backbone.Model.extend({
            defaults : {
                "name" : "",
                "status" : "draft",
                "quotation_price" : null,
                "quotation_date" : null,
                "customer_id" : null,
                "user_id" : null,
                "image" : null,
                "products" : null
            },

            urlRoot: "/api/project",

            initialize : function() {
                if (!(this.get('products') instanceof Backbone.Collection)) {
                    this.set('products', new ProductsCollection(this.get('products')));
                }

                this.on('change:products', function(){
                    if (!(this.get('products') instanceof Backbone.Collection)) {
                        this.set('products', new ProductsCollection(this.get('products')));
                    }
                });
            },

            toJSON : function () {
                return JSON.parse(JSON.stringify(this.attributes));
            }
        });

        return Project;
    });