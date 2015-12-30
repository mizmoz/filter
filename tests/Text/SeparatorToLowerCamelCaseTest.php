<?php
/**
 * @package Mizmoz
 * @copyright Copyright 2015 Mizmoz Limited - Released under the MIT license
 * @see https://www.mizmoz.com/labs/filter
 */

namespace Mizmoz\Filter\Tests\Text;

use Mizmoz\Filter\Tests\TestCase;
use Mizmoz\Filter\Text\SeparatorLowerToCamelCase;

class SeparatorToLowerCamelCaseTest extends TestCase
{
    /**
     * Test spaces to lower camelcase
     */
    public function testSpace()
    {
        $filter = new SeparatorLowerToCamelCase(' ');

        $this->assertSame('helloThereMr', $filter->filter('Hello there Mr'));
        $this->assertSame('hello', $filter->filter('Hello'));
        $this->assertSame('τάχιστηΑλώπηξ', $filter->filter('Τάχιστη αλώπηξ'));
    }

    /**
     * Test hyphens to lower camelcase
     */
    public function testHyphens()
    {
        $filter = new SeparatorLowerToCamelCase('-');

        $this->assertSame('helloThereMr', $filter->filter('Hello-there-Mr'));
        $this->assertSame('hello', $filter->filter('Hello'));
        $this->assertSame('τάχιστηΑλώπηξ', $filter->filter('Τάχιστη-αλώπηξ'));
    }
}
