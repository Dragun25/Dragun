<?php
namespace Dragun\DeliveryDate\Plugin\Checkout\Block;

use Dragun\DeliveryDate\Ui\Component\Listing\Column\ShopSel;
use Dragun\DeliveryDate\Model\Config;

class LayoutProcessor
{
    /**
     * @var \Dragun\DeliveryDate\Model\Config
     */
    protected $config;
    /**
     * @var ShopSel
     */
    protected $testSel;

    /**
     * LayoutProcessor constructor.
     * @param Config $config
     * @param ShopSel $testSel
     */
    public function __construct(
        Config $config,
        ShopSel $testSel
    ) {
        $this->config = $config;
        $this->testSel = $testSel;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array $jsLayout
    ) {

        $requiredDeliveryDate =  $this->config->getRequiredDeliveryDate()?: false;
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shippingAdditional'] = [
            'component' => 'uiComponent',
            'displayArea' => 'shippingAdditional',
            'display'=> 'none',
            'children' => [
                'delivery_date' => [
                    'component' => 'Dragun_DeliveryDate/js/view/delivery-date-block',
                    'displayArea' => 'delivery-date-block',
                    'deps' => 'checkoutProvider',
                    'dataScopePrefix' => 'delivery_date',
                    'children' => [
                        'form-fields' => [
                            'component' => 'uiComponent',
                            'displayArea' => 'delivery-date-block',
                            'children' => [
                                'delivery_date' => [
                                    'component' => 'Dragun_DeliveryDate/js/view/delivery-date',
                                    'config' => [
                                        'customScope' => 'delivery_date',
                                        'template' => 'ui/form/field',
                                        'elementTmpl' => 'Dragun_DeliveryDate/fields/delivery-date',
                                        'options' => [],
                                        'id' => 'delivery_date',
                                        'data-bind' => ['datetimepicker' => true]
                                    ],
                                    'dataScope' => 'delivery_date.delivery_date',
                                    'label' => 'Delivery Date',
                                    'provider' => 'checkoutProvider',
                                    'visible' => true,
                                    'validation' => [
                                        'required-entry' => $requiredDeliveryDate
                                    ],
                                    'sortOrder' => 10,
                                    'id' => 'delivery_date'
                                ],
                                'delivery_select' => [
                                    'component' => 'Magento_Ui/js/form/element/select',
                                    'config' => [
                                        'customScope' => 'delivery_date',
                                        'template' => 'ui/form/field',
                                        'elementTmpl' => 'ui/form/element/select',
                                        'options' => $this->testSel->toOptionArray(),
                                        'id' => 'delivery_select'
                                    ],
                                    'dataScope' => 'delivery_date.delivery_select',
                                    'label' => 'Select',
                                    'provider' => 'checkoutProvider',
                                    'visible' => true,
                                    'validation' => [],
                                    'sortOrder' => 30,
                                    'id' => 'delivery_select'
                                ],
                                'testchild' =>[
                                    'component'=> 'Dragun_DeliveryDate/js/view/testcomponent',
                                    'sortOrder'=> 999,
                                    'displayArea'=> 'authentication',
                                    'dataScope' => 'delivery_date.delivery_select.testchild'

                                ]
                            ],
                        ],
                    ]
                ]
            ]
        ];

        return $jsLayout;
    }
}
