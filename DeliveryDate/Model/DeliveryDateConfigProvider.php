<?php
namespace Dragun\DeliveryDate\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Store\Model\ScopeInterface;

class DeliveryDateConfigProvider implements ConfigProviderInterface
{
    const XPATH_FORMAT = 'dragun_deliverydate/general/format';
    const XPATH_DISABLED = 'dragun_deliverydate/general/disabled';
    const XPATH_HOURMIN = 'dragun_deliverydate/general/hourMin';
    const XPATH_HOURMAX = 'dragun_deliverydate/general/hourMax';

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $store = $this->getStoreId();
        $disabled = $this->scopeConfig->getValue(self::XPATH_DISABLED, ScopeInterface::SCOPE_STORE, $store);
        $hourMin = $this->scopeConfig->getValue(self::XPATH_HOURMIN, ScopeInterface::SCOPE_STORE, $store);
        $hourMax = $this->scopeConfig->getValue(self::XPATH_HOURMAX, ScopeInterface::SCOPE_STORE, $store);
        $format = $this->scopeConfig->getValue(self::XPATH_FORMAT, ScopeInterface::SCOPE_STORE, $store);

        $noday = 0;
        if($disabled == -1) {
            $noday = 1;
        }

        $config = [
            'shipping' => [
                'delivery_date' => [
                    'format' => $format,
                    'disabled' => $disabled,
                    'noday' => $noday,
                    'hourMin' => $hourMin,
                    'hourMax' => $hourMax,
                    'customOptionValue' => $this->getCustomOptionValue()
                ]
            ]
        ];

        return $config;
    }

    public function getStoreId()
    {
        return $this->storeManager->getStore()->getStoreId();
    }

    public function getCustomOptionValue()
    {
        return [
            'option1' => 'Option 1',
            'option2' => 'Option 2',
            'option3' => 'Option 3'
        ];
    }
}
