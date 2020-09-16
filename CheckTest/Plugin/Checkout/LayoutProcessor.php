<?php


namespace Dragun\CheckTest\Plugin\Checkout;


class LayoutProcessor
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Magento\Customer\Model\AddressFactory
     */
    protected $customerAddressFactory;

    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\CheckoutAgreements\Model\ResourceModel\Agreement\CollectionFactory $agreementCollectionFactory,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\AddressFactory $customerAddressFactory
    ) {
        $this->scopeConfig = $context->getScopeConfig();
        $this->checkoutSession = $checkoutSession;
        $this->customerAddressFactory = $customerAddressFactory;
    }
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $validation['required-entry'] = true;

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['before-form']['children']['delivery_date'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/date',
                'options' => [],
                'id' => 'delivery-date'
            ],
            'dataScope' => 'shippingAddress.delivery_date',
            'label' => 'Delivery Date',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [],
            'sortOrder' => 200,
            'id' => 'delivery-date'
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['before-form']['children']['delivery_text'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/text',
                'options' => [],
                'link' => 'This text see you',
                'id' => 'delivery-text'
            ],
            'dataScope' => 'shippingAddress.delivery_date.delivery-text',
            'label' => 'Delivery Text',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [],
            'sortOrder' => 201,
            'id' => 'delivery-text'
            ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['before-form']['children']['select_custom_shipping_field'] = [
            'component' => "Magento_Ui/js/form/element/select",
            'config' => [
                'customScope' => 'customShippingMethodFields',
                'template' => 'ui/form/field',
                'elementTmpl' => "ui/form/element/select",
                'id' => "select_custom_shipping_field"
            ],
            'dataScope' => 'customShippingMethodFields.custom_shipping_field[select_custom_shipping_field]',
            'label' => "Select option",
            'options' => $this->getSelectOptions(),
            'caption' => 'Please select',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => $validation,
            'sortOrder' => 205,
            'id' => 'custom_shipping_field[select_custom_shipping_field]'
        ];

        return $jsLayout;
    }

    protected function getSelectOptions()
    {
        $items[1]["value"] = "First Value";
        $items[1]["label"] = "First Label";

        $items[2]["value"] = "Second Value";
        $items[2]["label"] = "Second Label";

        return $items;
    }

}
