/*global define*/
define(["hbs/handlebars", 
        "i18n"],
    function (Handlebars, I18n) {
        "use strict";

        function i18n () {
            var keys = [];
            
            for(var i in arguments) {
                if (typeof arguments[i] == "string") {
                    keys.push(arguments[i]);
                }
            }
            var str = keys.join('.');
            
            return (I18n != undefined ? I18n.t(str) : str);
        }

        Handlebars.registerHelper("i18n", i18n);

        return i18n;
    });
