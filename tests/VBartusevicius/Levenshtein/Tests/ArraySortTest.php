<?php

namespace VBartusevicius\Levenshtein\Tests;

use VBartusevicius\Levenshtein\ArraySort;

class ArraySortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ArraySort
     */
    protected $arraySort;

    protected function setUp()
    {
        $this->arraySort = new ArraySort();
    }

    /**
     * @dataProvider testSortDataProvider
     *
     * @param string $needle
     * @param array  $haystack
     * @param array  $expected
     */
    public function testSort($needle, array $haystack, array $expected)
    {
        $result = $this->arraySort->sort($needle, $haystack);

        $values = array_values($result);
        foreach ($expected as $key => $string) {
            $this->assertSame($string, $values[$key]);
        }
    }

    public function testSortDataProvider()
    {
        return array(
            array(
                'text',
                array('texas', 'test', 'random'),
                array('test', 'texas', 'random')
            ),
            array(
                'text',
                array('random', 'test', 'texts', 'texas'),
                array(array('test', 'texts'), 'texas', 'random')
            )
        );
    }
}
