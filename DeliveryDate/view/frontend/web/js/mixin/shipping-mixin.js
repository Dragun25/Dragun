// define(
//     [
//         'jquery',
//         'ko'
//     ], function (
//         $,
//         ko
//     ) {
//         'use strict';
//
//         return function (target) {
//             return target.extend({
//                 setShippingInformation: function () {
//                     if (this.validateDeliveryDate()) {
//                         this._super();
//                     }
//                 },
//                 validateDeliveryDate: function() {
//                     this.source.set('params.invalid', false);
//                     this.source.trigger('delivery_date.data.validate');
//
//                     if (this.source.get('params.invalid')) {
//                         return false;
//                     }
//
//                     return true;
//                 }
//             });
//         }
//     }
// );

define([
    'jquery',
    'Magento_Checkout/js/model/quote'
], function ($, quote) {
    'use strict';

    return function (target) {
        return target.extend({

            /**
             * Set shipping information handler
             */
            setShippingInformation: function () {
                var shippingMethod = quote.shippingMethod();
                if (shippingMethod['method_code'] == 'freeshipping') {
                    if ($("#custom_option").val() == '') {
                        this.focusInvalid();
                        return false;
                    }
                }
                this._super();
            }
        });
    }
});
