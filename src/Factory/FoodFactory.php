<?php
/**
 * Class used to make different types of food and drink
 */

namespace Foodorder\Factory;

use Exception;

class FoodFactory
{
    public static function make($type)
    {
        $className = ucfirst($type);

        $fullyQualifiedName = '\\Foodorder\\Entity\\' . $className;

        if (class_exists($fullyQualifiedName)) {
            return new $fullyQualifiedName;
        } else {
            throw new Exception('Unable to create food item type ' . $fullyQualifiedName);
        }
    }
}
