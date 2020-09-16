<?php


namespace Dragun\DeliveryDate\Ui\Component\Listing\Column;


use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Dragun\DeliveryDate\Model\ResourceModel\Shop\CollectionFactory;
use Dragun\DeliveryDate\Controller\Frontend\Logick\TransleteColletion;

class ShopSel implements ArgumentInterface, OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    protected $shop;
    /**
     * @var TransleteColletion
     */
    protected $collection;


    /**
     * TestSel constructor.
     * @param CollectionFactory $shop
     * @param TransleteColletion $colletion
     */
    public function __construct(CollectionFactory $shop,
                                TransleteColletion $colletion
)
    {
        $this->shop = $shop;
        $this->collection = $colletion;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $collection = $this->shop->create();
        $items = $collection->getItems();
        $data =[];
        $data[] = ['value' => '000', 'label' => '--Please select magasin--', 'schedule' =>''];
        foreach ($items as $item)
        {
            $shopCode = $item->getData('schedule');
            $label = $item->getData('title'). ', '. $item->getData('adrus');


            $data[] = ['value' => $shopCode, 'label' => $label];
        }
        return $data;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getOptions();
    }

    public function getJsonCollection()
    {
        $result = $this->collection->execute();
        return $result;
    }
}
