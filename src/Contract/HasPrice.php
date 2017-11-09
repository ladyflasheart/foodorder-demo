<?php

namespace Foodorder\Contract;

/**
 * Interface that things that have a cost conform to
 */
interface HasPrice
{
    public function getPrice();
}
