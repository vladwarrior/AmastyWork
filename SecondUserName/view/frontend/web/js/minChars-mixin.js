define(['jquery'], function ($) {
    return function (target) {
        return target.extend({
            defaults: {
                minChars: 5
            }
        });
    };
});