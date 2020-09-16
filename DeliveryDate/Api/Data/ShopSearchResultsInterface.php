<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Api\Data;

interface ShopSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Shop list.
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Dragun\DeliveryDate\Api\Data\ShopInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

