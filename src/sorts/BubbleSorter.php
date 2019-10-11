<?php

declare(strict_types=1);

namespace Sandbox\sorts;

class BubbleSorter extends AbstractSorter
{
    public function sort(array $items): array
    {
        do {
            $swapped = false;
            for ($i = 0; $i < count($items) - 1; $i++) {
                $k = $i + 1;

                if ($items[$i] > $items[$k]) {
                    $swapped = true;

                    $items = $this->swap($items, $i, $k);
                }
            }
        }
        while($swapped);

        return $items;
    }
}
