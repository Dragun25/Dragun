<?php

namespace Dragun\MessageOnOff\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Dragun\MessageOnOff\Model\CustomConfigProvider;

class Account extends Template
{
    /**
     * @var array
     */
    protected $jsLayout;

    /**
     * @var CustomConfigProvider
     */
    protected $configProvider;

    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        CustomConfigProvider $configProvider,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this->configProvider = $configProvider;
    }

    /**
     * @return string
     */
    public function getJsLayout()
    {
        return \Zend_Json::encode($this->jsLayout);
    }

    public function getCustomConfig()
    {
        return $this->configProvider->getConfig();
    }
}