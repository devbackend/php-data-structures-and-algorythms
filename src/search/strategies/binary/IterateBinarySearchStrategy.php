<?php

declare(strict_types=1);

namespace Sandbox\search\strategies\binary;

class IterateBinarySearchStrategy extends AbstractBinarySearchStrategy
{
    public function search(int $value, array $array): ?int
    {
        $keys = array_keys($array);

        $firstKey = $keys[0];
        $lastKey  = $keys[count($array) - 1];

        $result = null;
        while ($lastKey >= $firstKey) {
            $middleKey   = (int) (($lastKey + $firstKey) / 2);
            $middleValue = $array[$middleKey];

            if ($middleValue === $value) {
                return $middleKey;
            }

            if ($value > $middleValue) {
                $firstKey = $middleKey + 1;

                continue;
            }

            $lastKey = $middleKey - 1;
        }

        return $result;
    }
}
