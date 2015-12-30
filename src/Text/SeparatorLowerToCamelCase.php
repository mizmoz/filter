<?php
/**
 * @package Mizmoz
 * @copyright Copyright 2015 Mizmoz Limited - Released under the MIT license
 * @see https://www.mizmoz.com/labs/filter
 */

namespace Mizmoz\Filter\Text;

use Mizmoz\Filter\Contract\Filter;

class SeparatorLowerToCamelCase implements Filter
{
    /**
     * @var string
     */
    private $separator;

    /**
     * SeparatorLowerToCamelCase constructor.
     * @param string $separator
     */
    public function __construct($separator = ' ')
    {
        $this->separator = $separator;
    }

    /**
     * @inheritdoc
     */
    public function filter($value)
    {
        // explode the string by the separator
        $parts = explode($this->separator, (string)$value);

        // uppercase the first letter in all but the first item in the array
        $parts = array_map(function ($part, $key) {
            return mb_convert_case($part, ($key ? MB_CASE_TITLE : MB_CASE_LOWER));
        }, $parts, array_keys($parts));

        // no join the items in the array
        return implode('', $parts);
    }
}
