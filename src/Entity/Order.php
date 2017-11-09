<?php

namespace Foodorder\Entity;

use Foodorder\Contract\HasName;
use Foodorder\Contract\HasPrice;

/**
 * An Order of Food/Drink
 */
class Order
{
    private $OrderItems = [];

    private $ValidItems = [
        'burger',
        'pizza',
        'salad',
        'sprite',
        'cola',
    ];

    /**
     * @return array
     */
    public function getOrderItems()
    {
        return $this->OrderItems;
    }

    /**
     * @param Edible $Item
     */
    public function addItem($Item)
    {
        $this->OrderItems[] = $Item;
    }

    /**
     * @param array the names of food items to check
     * @return bool
     */
    public function validateOrderItems(array $itemNames)
    {
        foreach ($itemNames as $name) {
            if (!in_array($name, $this->ValidItems)) {
                return false;
            }
        }

        return true;
    }

    private function getItemNames(HasName $item)
    {
        return $item->getName();
    }

    /**
     * @return string
     */
    public function listOrderItems()
    {
        if (empty($this->OrderItems)) {
            return '';
        }

        $itemStrings = array_map([$this, 'getItemNames'], $this->OrderItems);
        return implode(', ', $itemStrings);
    }

    /**
     * @param HasPrice $item
     *
     * @return int
     */
    private function getAllItemPrices(HasPrice $item)
    {
        return $item->getPrice();
    }

    /**
     * @return string formatted currency representation
     */
    public function calculateTotalPrice()
    {
        if (empty($this->OrderItems)) {
            return money_format('%!i', 0.0);
        }

        $allPrices = array_map([$this, 'getAllItemPrices'], $this->OrderItems);

        $total = array_sum($allPrices) / 100;

        setlocale(LC_MONETARY, 'en_GB');

        return money_format('%!i', $total);
    }
}
