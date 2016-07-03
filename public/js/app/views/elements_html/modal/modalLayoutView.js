/*global define, sessionStorage, window, App*/
define(["marionette",
        "underscore",
        "bootstrap",
        "baseLayoutView",
        "hbs/handlebars",
        "hbs!/js/app/templates/elements_html/modal/modal",
        "hbs!/js/app/templates/elements_html/modal/defaultFooterModal"],
    function (Marionette, _, Bootstrap, BaseLayoutView, Handlebars, modalTemplate, DefaultFooterModalTemplate) {
        "use strict";

        var ModalLayoutView = BaseLayoutView.extend({
            template: modalTemplate,
            className: "modal fade",
            attributes: {
                "role": "dialog",
                "ariaLabelledby": "myModalLabel",
                "data-backdrop": "static",
                "data-keyboard": false
            },
            data: {
                id: "",
                title: "",
                class: "",
                content: "",
                icon: "",
                close: true,
                closeFooterButton: true
            },
            initialize: function (options) {
                var that = this;

                this.data.bodyId    = _.uniqueId('modal_');
                this.data.footer    = null;
                this.data.footerId  = "footer_"+this.data.bodyId;

                if (options) {
                    this.setDataAttributesToModalHtml(options);
                }

                this.render();

                this.$el.on('hidden.bs.modal', function(e){
                    $('.modal:visible').length && $(document.body).addClass('modal-open');
                    that.remove();
                });
            },
            onDestroy : function () {
                this.$el.off('hidden.bs.modal');
            },
            showModal: function () {
                this.$el.modal();
            },
            closeModal: function () {
                this.$el.modal('hide');
            },
            show: function () {
                this.$el.show();
            },

            hide: function () {
                this.$el.hide();
            },

            setId: function (id) {
                this.data.id = id;
            },

            setTitle: function (title) {
                this.data.title = title;
            },

            setClass: function (extraClass) {
                this.data.class = extraClass;
            },

            setBody: function (body) {
                if (body instanceof Marionette.ItemView || body instanceof Marionette.LayoutView) {
                    this.data.body = body;
                } else {
                    this.data.body = this.createDynamicBodyItemView(body);
                }
            },

            setFooter: function (footer) {
                if (footer instanceof Marionette.ItemView || footer instanceof Marionette.LayoutView) {
                    this.data.footer = footer;
                } else {
                    this.data.footer = this.createDefaultFooterView();
                }
            },

            setIcon: function (icon) {
                this.data.icon = icon;
            },

            setClose: function (close) {
                this.data.close = close;
            },

            setCloseFooterButton: function (close) {
                this.data.closeFooterButton = close;
            },

            setDataAttributesToModalHtml: function (options) {
                if (options.modalId) {
                    this.setId(options.id);
                }
                if (options.title) {
                    this.setTitle(options.title);
                }
                if (options.class) {
                    this.setClass(options.class);
                }
                if (options.body) {
                    this.setBody(options.body);
                }
                if (options.footer) {
                    this.setFooter(options.footer);
                }
                if (typeof options.closeFooterButton !== "undefined") {
                    this.setCloseFooterButton(options.closeFooterButton);
                }
                if (typeof options.close !== "undefined") {
                    this.setClose(options.close);
                }
            },

            createDynamicBodyItemView: function (body) {
                var TempItemView = Marionette.ItemView.extend({
                    data: {},
                    initialize: function (options) {
                        this.data.body = options.body;
                    },
                    template: Handlebars.compile("{{{data.body}}}"),
                    serializeData: function () {
                        var viewData = {data: this.data};
                        return _.extend(viewData, Marionette.ItemView.prototype.serializeData.apply(this, arguments));
                    }
                });

                var tempItemView = new TempItemView({body: body});
                return tempItemView;
            },

            createDefaultFooterView: function () {
                var TempFooterView = Marionette.ItemView.extend({
                    template: DefaultFooterModalTemplate
                });

                var tempFooterView = new TempFooterView();
                return tempFooterView;
            },

            remove : function () {
                this.data.body.destroy();
                this.$el.remove();
                this.destroy();
            },

            onRender: function () {
                this.addRegion("body", "#"+this.data.bodyId);
                this.getRegion("body").show(this.data.body);

                if (this.data.footer) {
                    this.addRegion("footer", "#"+this.data.footerId);
                    this.getRegion("footer").show(this.data.footer);
                }

            }
        });

        return ModalLayoutView;
    });