<?php
/**
 * @package Mizmoz
 * @copyright Copyright 2015 Mizmoz Limited - Released under the MIT license
 * @see https://www.mizmoz.com/labs/filter
 */

namespace Mizmoz\Filter\Contract;

interface Filter
{
    /**
     * Filter the passed value
     *
     * @param $value
     * @return mixed
     */
    public function filter($value);
}
