<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Model\ResourceModel\Shop;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'shop_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Dragun\DeliveryDate\Model\Shop::class,
            \Dragun\DeliveryDate\Model\ResourceModel\Shop::class
        );
    }
}

