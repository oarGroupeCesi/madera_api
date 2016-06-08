/*global define*/
define(["backbone"],
    function (Backbone) {
        "use strict";

        var Product = Backbone.Model.extend({
            defaults : {
                "name" : null,
                "range_id" : null,
                "project_id" : null
            },
            urlRoot: "/api/product"
        });

        return Product;
    });
