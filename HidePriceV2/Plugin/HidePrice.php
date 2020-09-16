<?php


namespace Dragun\HidePriceV2\Plugin;

use Magento\Catalog\Model\Product\Pricing\Renderer\SalableResolverInterface;
use Magento\Catalog\Pricing\Price\MinimalPriceCalculatorInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Pricing\Price\PriceInterface;
use Magento\Framework\Pricing\Render\RendererPool;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Template\Context;
use Dragun\HidePriceV2\Helper\Data;
use Magento\Catalog\Pricing\Render\FinalPriceBox;
//use Web\HidePrice\Pricing\Render\FinalPriceBox;
use Magento\Framework\Pricing\SaleableInterface;


class HidePrice
{
    public  $helperData;
    public $product;
    public $subject;


    public function __construct(Data $helperData)
    {
        $this->helperData = $helperData;

    }

    public function afterToHtml(\Magento\Catalog\Pricing\Render\FinalPriceBox $subject, $html) {

        return "<strong>Log in to see the price</strong>";
    }

}
