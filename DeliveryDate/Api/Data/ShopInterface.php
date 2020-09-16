<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Api\Data;

interface ShopInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const TITLE = 'title';
    const EMAIL = 'email';
    const ADRUS = 'adrus';
    const PHONE = 'phone';
    const SCHEDULE = 'schedule';
    const CITY = 'city';
    const SHOP_ID = 'shop_id';

    /**
     * Get shop_id
     * @return string|null
     */
    public function getShopId();

    /**
     * Set shop_id
     * @param string $shopId
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setShopId($shopId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setTitle($title);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Dragun\DeliveryDate\Api\Data\ShopExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Dragun\DeliveryDate\Api\Data\ShopExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Dragun\DeliveryDate\Api\Data\ShopExtensionInterface $extensionAttributes
    );

    /**
     * Get city
     * @return string|null
     */
    public function getCity();

    /**
     * Set city
     * @param string $city
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setCity($city);

    /**
     * Get adrus
     * @return string|null
     */
    public function getAdrus();

    /**
     * Set adrus
     * @param string $adrus
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setAdrus($adrus);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setEmail($email);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setPhone($phone);

    /**
     * Get schedule
     * @return string|null
     */
    public function getSchedule();

    /**
     * Set schedule
     * @param string $schedule
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setSchedule($schedule);
}

