define([
    'jquery'
], function ($) {
    "use strict";
    return function (config, element) {
        $(element).click(function () {
            var form = $(config.form),
                baseUrl = form.attr('action'),
                addToCartUrl = 'checkout/cart/add',
                buyNowCartUrl = 'buynow/cart/buylens',
                buyNowUrl = baseUrl.replace(addToCartUrl, buyNowCartUrl);
            form.attr('action', buyNowUrl);
            form.trigger('submit');
            form.attr('action', baseUrl);
            return false;
        });
    }
});
