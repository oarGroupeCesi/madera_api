define(["backbone"],
    function (Backbone) {
        "use strict";

        var ModuleNature = Backbone.Model.extend({
            defaults : {
                "name" : null,
                "unity" : null,
                "price" : null
            },
            urlRoot: "/api/modulenature"
        });

        return ModuleNature;
    });