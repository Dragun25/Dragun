<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Model\Data;

use Dragun\DeliveryDate\Api\Data\ShopInterface;

class Shop extends \Magento\Framework\Api\AbstractExtensibleObject implements ShopInterface
{

    /**
     * Get shop_id
     * @return string|null
     */
    public function getShopId()
    {
        return $this->_get(self::SHOP_ID);
    }

    /**
     * Set shop_id
     * @param string $shopId
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setShopId($shopId)
    {
        return $this->setData(self::SHOP_ID, $shopId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Dragun\DeliveryDate\Api\Data\ShopExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Dragun\DeliveryDate\Api\Data\ShopExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Dragun\DeliveryDate\Api\Data\ShopExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get city
     * @return string|null
     */
    public function getCity()
    {
        return $this->_get(self::CITY);
    }

    /**
     * Set city
     * @param string $city
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get adrus
     * @return string|null
     */
    public function getAdrus()
    {
        return $this->_get(self::ADRUS);
    }

    /**
     * Set adrus
     * @param string $adrus
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setAdrus($adrus)
    {
        return $this->setData(self::ADRUS, $adrus);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    /**
     * Set phone
     * @param string $phone
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get schedule
     * @return string|null
     */
    public function getSchedule()
    {
        return $this->_get(self::SCHEDULE);
    }

    /**
     * Set schedule
     * @param string $schedule
     * @return \Dragun\DeliveryDate\Api\Data\ShopInterface
     */
    public function setSchedule($schedule)
    {
        return $this->setData(self::SCHEDULE, $schedule);
    }
}

