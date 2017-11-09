<?php

/**
 * Pizza
 */
class Pizza implements Edible, HasPrice, HasName
{
    private $name = 'pizza';

    private $type = 'main course';

    private $price = 200;

    private $ingredients = [
        'pizza dough',
        'tomato puree',
        'mozzarella cheese',
        'olives',
        'oregano',
    ];

    private $description = 'Classic Ialian style cheese and tomato pizza with olives';

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->$type = $type;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function listIngredients()
    {
        return implode(', ', $this->getIngredients());
    }

}
