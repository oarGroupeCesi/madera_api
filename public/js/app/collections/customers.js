define(["backbone",
        "models/customer"],
    function (Backbone, CustomerModel) {
        "use strict";

        var CustomersCollection = Backbone.Collection.extend({
            model: CustomerModel,
            url: function () {
                return "/api/customer";
            }
        });

        return CustomersCollection;
    });
