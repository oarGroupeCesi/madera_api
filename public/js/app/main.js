require.config({
    baseUrl: 'js/app',
    paths: {
        "jquery": "/js/vendor/jquery/jquery-2.1.4.min",
        "underscore": "/js/vendor/underscore/underscore-min",
        "backbone": "/js/vendor/backbone/backbone-min",
        "backbone.radio": "/js/vendor/backbone.radio/backbone.radio",
        "marionette" : "/js/vendor/marionette/backbone.marionette",
        "hbs": "/js/vendor/require/plugins/require-handlebars-plugin/hbs",
        "text": "/js/vendor/require/plugins/text/text",
        "i18n": "/js/vendor/require/plugins/require-i18next/i18next.min",
        "i18nXHR": "/js/vendor/require/plugins/require-i18next/plugins/i18nextXHRBackend.min",
        "baseLayoutView" : "/js/app/views/baseLayoutView",
        "baseItemView" : "/js/app/views/baseItemView",
        "bootstrap" : "/js/vendor/bootstrap/bootstrap.min",
        "helpers" : "/js/app/libs/helpers",
        "jquery.validate" : "/js/vendor/jquery/plugins/validate/jquery.validate",
        "jquery.navgoco" : "/js/vendor/jquery/plugins/nav/jquery.navgoco",
        "moment" : "/js/vendor/momentjs/moment",
        "tooltip" : "/js/vendor/bootstrap/tooltip/tooltip",
        "select2" : "/js/vendor/jquery/plugins/select2/js/select2.min",
        "select2/i18n/fr" : "/js/vendor/jquery/plugins/select2/i18n/fr"
    },
    hbs: {
        "templateExtension": "hbs",
        "hbs/underscore": "underscore"
    },
    shim: {
        "backbone": {
            "deps": ["underscore", "jquery"],
            "exports": "Backbone"
        },
        "marionette" : {
            "deps": ["backbone"],
            "exports":"Marionette"
        },
        "select2" : {
            "deps" : ['jquery'],
            "exports": "$.fn.select2"
        },
        "select2/i18n/fr" : {
            "deps" : ['select2'],
            "exports": "select2/i18n/fr"
        }
    }
});

require([ 'app' ], function(App) {
  App.initialize();
});