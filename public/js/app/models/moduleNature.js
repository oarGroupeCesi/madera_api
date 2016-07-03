define(["backbone"],
    function (Backbone) {
        "use strict";

        var ModuleNature = Backbone.Model.extend({
            defaults : {
                "name" : null,
                "unity" : null,
                "price" : null
            },

            urlRoot: "/api/modulenature",

            toJSON : function () {
                return JSON.parse(JSON.stringify(this.attributes));
            }
        });

        return ModuleNature;
    });