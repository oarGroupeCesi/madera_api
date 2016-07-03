/*global define*/
define(["backbone"],
    function (Backbone) {
        "use strict";

        var Range = Backbone.Model.extend({
            defaults : {
                "name" : null,
                "exterior_finish" : null,
                "insulating" : null,
                "top" : null,
                "configuration" : null,
                "template" : null
            },

            urlRoot: "/api/range",

            toJSON : function () {
                return JSON.parse(JSON.stringify(this.attributes));
            }
        });

        return Range;
    });
