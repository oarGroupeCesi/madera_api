/*global define*/
define(["backbone",
        "collections/modules"],
    function (Backbone, ModulesCollection) {
        "use strict";

        var Product = Backbone.Model.extend({
            defaults : {
                "name" : null,
                "range_id" : null,
                "project_id" : null,
                "modules" : null
            },

            urlRoot: "/api/product",

            initialize : function() {
                if (!(this.get('modules') instanceof Backbone.Collection)) {
                    this.set('modules', new ModulesCollection(this.get('modules')));
                }

                this.on('change:modules', function(){
                    if (!(this.get('modules') instanceof Backbone.Collection)) {
                        this.set('modules', new ModulesCollection(this.get('modules')));
                    }
                });
            },

            toJSON : function () {
                return JSON.parse(JSON.stringify(this.attributes));
            }
        });

        return Product;
    });
