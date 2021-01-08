define([
    'Magento_Customer/js/customer-data'
], function (customerData) {
    'use strict';

    var status = window.valuesConfig;
    var customData = window.customConfig;
    // if (window.customConfig.test != '0'){return '';}

    return function (target) {
        return target.extend({
            /**
             * Extends Component object by storage observable messages.
             */
            initialize: function () {
                this._super();
                var self = this;
                self.messages.subscribe(function(messages) {
                    if (messages.messages) {
                        if (messages.messages.length > 0 && window.customConfig.test != '0') {
                            // setTimeout(function() {
                            //     customerData.set('messages', {});
                            // }, 10000);
                            jQuery('.messages').hide()
                        }
                    }
                });
            }
        });
    }
});