<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Model;

use Magento\Framework\Api\DataObjectHelper;
use Dragun\DeliveryDate\Api\Data\ShopInterface;
use Dragun\DeliveryDate\Api\Data\ShopInterfaceFactory;

class Shop extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'dragun_deliverydate_shop';
    protected $shopDataFactory;

    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ShopInterfaceFactory $shopDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Dragun\DeliveryDate\Model\ResourceModel\Shop $resource
     * @param \Dragun\DeliveryDate\Model\ResourceModel\Shop\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ShopInterfaceFactory $shopDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Dragun\DeliveryDate\Model\ResourceModel\Shop $resource,
        \Dragun\DeliveryDate\Model\ResourceModel\Shop\Collection $resourceCollection,
        array $data = []
    ) {
        $this->shopDataFactory = $shopDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve shop model with shop data
     * @return ShopInterface
     */
    public function getDataModel()
    {
        $shopData = $this->getData();

        $shopDataObject = $this->shopDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $shopDataObject,
            $shopData,
            ShopInterface::class
        );

        return $shopDataObject;
    }
}

