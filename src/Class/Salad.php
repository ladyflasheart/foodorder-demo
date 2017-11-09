<?php

/**
 * Salad
 */
class Salad implements Edible, HasPrice, HasName
{
    private $name = 'salad';

    private $type = 'main course';

    private $price = 120;

    private $ingredients = [
        'lettuce',
        'tomatoes',
        'cucumber',
        'olive oil',
        'vinegar',
        'croutons',
    ];

    private $description = 'Fresh summer salad with light dressing and croutons';

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
