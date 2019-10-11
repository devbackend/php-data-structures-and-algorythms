<?php

declare(strict_types=1);

namespace Sandbox;

use PHPUnit\Framework\TestCase;
use Sandbox\sorts\AbstractSorter;

abstract class SortTestCase extends TestCase
{
    abstract protected function getSorter(): AbstractSorter;

    /**
     * @dataProvider getSortable
     *
     * @param array $expected
     * @param array $items
     */
    public function testSort(array $expected, array $items)
    {
        self::assertEquals($expected, $this->getSorter()->sort($items));
    }

    /**
     * @return array
     */
    public function getSortable(): array
    {
        return [
            [
                [1],
                [1],
            ],
            [
                [1, 2],
                [2, 1],
            ],
            [
                [1, 2, 3],
                [2, 1, 3],
            ],
            [
                [1, 2, 3, 4],
                [4, 2, 1, 3],
            ],
            [
                [1, 2, 2, 3, 4, 5, 6, 7, 8, 9],
                [3, 2, 1, 2, 9, 8, 7, 6, 5, 4],
            ],
        ];
    }
}
