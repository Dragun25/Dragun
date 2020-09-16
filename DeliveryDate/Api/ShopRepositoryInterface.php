<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ShopRepositoryInterface
{

    /**
     * Save Shop
     * @param \Dragun\DeliveryDate\Api\Data\ShopInterface $shop
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Dragun\DeliveryDate\Api\Data\ShopInterface $shop
    );

    /**
     * Retrieve Shop
     * @param string $shopId
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($shopId);

    /**
     * Retrieve Shop matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Dragun\DeliveryDate\Api\Data\ShopSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Shop
     * @param \Dragun\DeliveryDate\Api\Data\ShopInterface $shop
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Dragun\DeliveryDate\Api\Data\ShopInterface $shop
    );

    /**
     * Delete Shop by ID
     * @param string $shopId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($shopId);
}

