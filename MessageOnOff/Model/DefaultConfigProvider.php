<?php

namespace Dragun\MessageOnOff\Model;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class DefaultConfigProvider implements ConfigProviderInterface
{
    const XPATH_ENABLE = 'sales/messageonoff/messageenable';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Js constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }
    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $config = [
            'test' =>$this->scopeConfig->getValue(
                self::XPATH_ENABLE)
        ];

        return $config;
    }
}