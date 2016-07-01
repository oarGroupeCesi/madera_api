define(["backbone",
        "collections/products",
        "collections/modules"],
    function (Backbone, ProductsCollection, ModulesCollection) {
        "use strict";

        var Project = Backbone.Model.extend({
            defaults : {
                "name" : "",
                "status" : "draft",
                "quotation_price" : null,
                "quotation_date" : null,
                "customer_id" : null,
                "user_id" : null,
                "products" : new ProductsCollection(),
                "modules" : new ModulesCollection()
            },
            urlRoot: "/api/project"
        });

        return Project;
    });