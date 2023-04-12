define(['jquery'], function ($) {
    var widgetMixin = {
        hideElements: function () {
            this._super();
            this.hideMenu();
        },
        hideMenu: function () {
            $('.sections.nav-sections').hide();
        }
    };

    return function (targetWidget) {
        $.widget('myspace.testwidget', targetWidget, widgetMixin);

        return $.myspace.testwidget;
    }
});