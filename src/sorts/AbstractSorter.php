<?php

declare(strict_types=1);

namespace Sandbox\sorts;

abstract class AbstractSorter
{
    abstract public function sort(array $items): array;

    protected function swap(array $items, int $left, int $right): array
    {
        if ($left === $right) {
            return $items;
        }

        $temp          = $items[$left];
        $items[$left]  = $items[$right];
        $items[$right] = $temp;

        return $items;
    }
}
