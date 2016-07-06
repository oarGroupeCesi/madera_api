define(["backbone",
    "marionette",
    "baseItemView",
    "hbs!/js/app/templates/modules/stepChoice"],
        function (Backbone, Marionette,
                  BaseItemView,
                  StepChoiceTemplate) {
            "use strict";

            var StepChoiceView = BaseItemView.extend({
                template: StepChoiceTemplate,

                events : {
                    'click .addAnotherProduct'  : 'redirectToProductsStep',
                    'click .nextStep'           : 'nextStep'
                },

                initialize: function (options) {
                    var that = this;

                    BaseItemView.prototype.initialize.apply(this, arguments);
                },

                redirectToProductsStep : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate(
                        "projects/edit/"+ this.model.id + "/step1/products/edit", {trigger:true}
                    );
                },

                nextStep : function (e) {
                    e.preventDefault();

                    Backbone.history.navigate(
                        "projects/edit/" + this.model.id + "/step3/preview", {trigger:true}
                    );
                },
            });

            return StepChoiceView;
        });