define(["marionette",
        "underscore",
        "backbone.radio",
        "collections/modules",
        "models/module"],
    function (Marionette, _, Radio, ModulesCollection, ModuleModel) {
        "use strict";

        var moduleObject = Marionette.Object.extend({
            moduleId : null,

            initialize : function () {
                this.channel = Radio.channel('Modules');

                this.channel.reply('getModules', this.getModules.bind(this));
                this.channel.reply('getModule', this.getModule.bind(this));
                this.channel.reply('saveModule', this.saveModule.bind(this));
                this.channel.reply('deleteModule', this.deleteModule.bind(this));
            },

            getModules : function () {
                var modules = new ModulesCollection();

                App.trigger('ajax:setTokenHeaders');

                return modules.fetch();
            },

            getModule : function (productId) {
                var modules = new ModulesCollection();

                App.trigger('ajax:setTokenHeaders');

                return modules.fetch({
                    'product_id' : productId
                });
            },

            saveModule : function (data) {
                var moduleModel = new ModuleModel(data);

                if (!data) {
                    return;
                }

                App.trigger('ajax:setTokenHeaders');

                return moduleModel.save();
            },

            deleteModule : function(module, options) {
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

                module.destroy(options);

                return deferred.promise();
            }
        });

        return moduleObject;
    });
