<?php

namespace Dragun\GooMap\Block\Adminhtml\System\Config\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Config\Block\System\Config\Form\Field as FormField;

class AutoFill extends FormField
{
    /**
     * @var string
     */
    protected $_template = 'Dragun_GooMap::system/config/form/field/autofill_button.phtml';

    /**
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $this->setElement($element);

        return $this->_toHtml();
    }
}
