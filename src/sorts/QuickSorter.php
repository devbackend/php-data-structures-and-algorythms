<?php

declare(strict_types=1);

namespace Sandbox\sorts;

class QuickSorter extends AbstractSorter
{
    /**
     * @param array $items
     *
     * @return array
     */
    public function sort(array $items): array
    {
        if (count($items) < 2) {
            return $items;
        }

        $control = array_shift($items);

        $left  = [];
        $right = [];

        foreach ($items as $item) {
            if ($item > $control) {
                $right[] = $item;
            }
            else {
                $left[] = $item;
            }
        }

        $items = array_merge(
            $this->sort($left),
            [$control],
            $this->sort($right)
        );

        return $items;
    }
}
