<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Model\ResourceModel;

class Shop extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('dragun_deliverydate_shop', 'shop_id');
    }
}

