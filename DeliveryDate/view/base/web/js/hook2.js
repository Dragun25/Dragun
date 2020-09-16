define([
    'jquery',
    'domReady!',
    'Magento_Checkout/js/action/select-shipping-method'
], function ($) {
    'use strict';

    // console.log("Скрыть");
    // require(["jquery"], function($) {
    //     $(document).ready(function(){
    //         $(document).on("click", "[value='freeshipping_freeshipping']", function () {
    //             $('#onepage-checkout-shipping-method-additional-load').show();
    //         });
    //     });
    //
    //
    // });
    require(["jquery"], function($) {
        $(document).ready(function(){

            $('#onepage-checkout-shipping-method-additional-load').hide();

            $(document).on("click", ".row", function () {
                let resalt = $('.radio:checked').val()
                if (resalt == 'freeshipping_freeshipping'){
                    $('#onepage-checkout-shipping-method-additional-load').show();
                }
                else {
                    $('#onepage-checkout-shipping-method-additional-load').hide();
                }
                // console.log(resalt)
            });
        });


    });


    return function (targetModule) {
        targetModule.crazyPropertyAddedHere = 'yes';
        return targetModule;
    };
});
