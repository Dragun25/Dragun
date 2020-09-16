var config = {
    "map": {
        "*": {
            'Magento_Checkout/js/model/shipping-save-processor/default': 'Dragun_DeliveryDate/js/model/shipping-save-processor/default'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'Dragun_DeliveryDate/js/mixin/shipping-mixin': true
            },
            'Amazon_Payment/js/view/shipping': {
                'Dragun_DeliveryDate/js/mixin/shipping-mixin': true
            },
            'Magento_Checkout/js/action/set-shipping-information': {
                'Dragun_DeliveryDate/js/hook': true,
                'Dragun_DeliveryDate/js/hook2': true,
            }
        }
    }
};
