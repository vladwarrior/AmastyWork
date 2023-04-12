define(['jquery'], function ($) {
   $.widget('myspace.testwidget', {
       options: {
           selector: null
       },
       _create: function () {
           this.hideElements();
       },
       hideElements: function () {
           $(this.options.selector).hide();
           $(this.element).hide();
       }
   });

   return $.myspace.testwidget;
});


define(['jquery'], function ($) {
    // return function () {
    //     $('.page-footer').hide();
    // }

    return function (config, element) {
        $(element).hide();
        $(config.selector).hide();
    }
});