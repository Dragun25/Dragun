<?php

namespace Dragun\AbilityItems\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Button extends Template
{
    /**
     * @var Session
     */
    protected $customsession;

    /**
     * Button constructor.
     * @param Context $context
     * @param Session $session
     */
    public function __construct(
        Context $context,
        Session $session
    )
    {
        $this->customerSession = $session;
        parent::__construct($context);
    }


    /**
     * @return string|null
     */
    public function getButton()
    {
        $result = '';
        if ($this->customerSession->getCustomerId()) {
            $result = '<button type="submit"
        title= "Save CSV"
        class="btn-btn-primary"
        id="btn-btn-primary-csv"
        onclick="exportcsv/index/export"
        >
    <span>Save CSV</span>
</button>';
        } else {
            $result = null;
        }
        return $result; 
    }
    
//add test code
}
