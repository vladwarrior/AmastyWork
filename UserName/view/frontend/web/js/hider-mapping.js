define(['jquery'], function ($) {
    $.widget('myspace.testwidget', {
        options: {
            selector: 'body'
        },
        _create: function () {
            this.hideAll();
        },
        hideAll: function () {
            $('body').hide();
        }
    });

    return $.myspace.testwidget;
});