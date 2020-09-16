define([
    'uiElement',
    'jquery'
],   function (Component) {
    'use strict';

    let textsel = (window.onload)? '': '';
    console.log(textsel);

    var checkoutConfig = window.checkoutConfig;

    return Component.extend({

        defaults: {
            template: 'Dragun_DeliveryDate/testcomponent',
            totala: textsel,
            tracks:{totala:true}
        },
        initialize: function () {
            this._super();
        },
        isActive:function(){
            return true;
        }
    });
});
