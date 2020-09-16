<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Dragun\DeliveryDate\Api\Data\ShopInterfaceFactory;
use Dragun\DeliveryDate\Api\Data\ShopSearchResultsInterfaceFactory;
use Dragun\DeliveryDate\Api\ShopRepositoryInterface;
use Dragun\DeliveryDate\Model\ResourceModel\Shop as ResourceShop;
use Dragun\DeliveryDate\Model\ResourceModel\Shop\CollectionFactory as ShopCollectionFactory;

class ShopRepository implements ShopRepositoryInterface
{

    protected $resource;

    protected $dataObjectHelper;

    protected $extensibleDataObjectConverter;
    private $storeManager;

    protected $dataObjectProcessor;

    protected $shopCollectionFactory;

    protected $searchResultsFactory;

    protected $shopFactory;

    private $collectionProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $dataShopFactory;


    /**
     * @param ResourceShop $resource
     * @param ShopFactory $shopFactory
     * @param ShopInterfaceFactory $dataShopFactory
     * @param ShopCollectionFactory $shopCollectionFactory
     * @param ShopSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceShop $resource,
        ShopFactory $shopFactory,
        ShopInterfaceFactory $dataShopFactory,
        ShopCollectionFactory $shopCollectionFactory,
        ShopSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->shopFactory = $shopFactory;
        $this->shopCollectionFactory = $shopCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataShopFactory = $dataShopFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Dragun\DeliveryDate\Api\Data\ShopInterface $shop
    ) {
        /* if (empty($shop->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $shop->setStoreId($storeId);
        } */

        $shopData = $this->extensibleDataObjectConverter->toNestedArray(
            $shop,
            [],
            \Dragun\DeliveryDate\Api\Data\ShopInterface::class
        );

        $shopModel = $this->shopFactory->create()->setData($shopData);

        try {
            $this->resource->save($shopModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the shop: %1',
                $exception->getMessage()
            ));
        }
        return $shopModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($shopId)
    {
        $shop = $this->shopFactory->create();
        $this->resource->load($shop, $shopId);
        if (!$shop->getId()) {
            throw new NoSuchEntityException(__('Shop with id "%1" does not exist.', $shopId));
        }
        return $shop->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->shopCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Dragun\DeliveryDate\Api\Data\ShopInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Dragun\DeliveryDate\Api\Data\ShopInterface $shop
    ) {
        try {
            $shopModel = $this->shopFactory->create();
            $this->resource->load($shopModel, $shop->getShopId());
            $this->resource->delete($shopModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Shop: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($shopId)
    {
        return $this->delete($this->get($shopId));
    }
}

