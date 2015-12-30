<?php
/**
 * @package Mizmoz
 * @copyright Copyright 2015 Mizmoz Limited - Released under the MIT license
 * @see https://www.mizmoz.com/labs/filter
 */

namespace Mizmoz\Filter\Tests\Cleaner;

use Mizmoz\Filter\Cleaner\Name;
use Mizmoz\Filter\Tests\TestCase;

class NameTest extends TestCase
{
    /**
     * Test names like bob, dave etc.
     */
    public function testSingleName()
    {
        $filter = new Name();

        $this->assertSame([
            'forename' => 'Ian',
            'surname' => ''
        ], $filter->filter('Ian'));

        $this->assertSame([
            'forename' => 'Dave',
            'surname' => ''
        ], $filter->filter('dave'));
    }

    /**
     * Test names like Ian Chadwick
     */
    public function testDoubleName()
    {
        $filter = new Name();

        $this->assertSame([
            'forename' => 'Ian',
            'surname' => 'Chadwick'
        ], $filter->filter('Ian Chadwick'));

        $this->assertSame([
            'forename' => 'Dave',
            'surname' => 'Jones'
        ], $filter->filter('dave jones'));
    }

    /**
     * Test names like Ian Charles Chadwick
     */
    public function testTripleName()
    {
        $filter = new Name();

        $this->assertSame([
            'forename' => 'Ian',
            'surname' => 'Charles Chadwick'
        ], $filter->filter('Ian Charles Chadwick'));

        $this->assertSame([
            'forename' => 'Dave',
            'surname' => 'Harry Jones'
        ], $filter->filter('dave harry jones'));
    }
}
