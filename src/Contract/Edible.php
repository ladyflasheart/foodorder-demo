<?php

/**
 * Interface that comestibles conform to
 */
interface Edible
{
    public function listIngredients();

    public function getType();

    public function getDescription();
}
