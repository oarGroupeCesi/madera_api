/*global define*/
define(["hbs/handlebars"],
        function (Handlebars) {
            "use strict";

            function is (a, b, opts) {
                if (a == b) {
                    return opts.fn(this);
                } else {
                    return opts.inverse(this);
                }
            }

            Handlebars.registerHelper('is', is);

            return is;
        });
    