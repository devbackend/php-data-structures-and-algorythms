<?php

declare(strict_types=1);

namespace Sandbox\search\strategies\binary;

class RecursiveBinarySearchStrategy extends AbstractBinarySearchStrategy
{
    public function search(int $value, array $array): ?int
    {
        $keys = array_keys($array);

        $firstKey = $keys[0];
        $lastKey  = $keys[count($array) - 1];

        return $this->innerSearch($array, $value, $firstKey, $lastKey);
    }

    private function innerSearch(array $array, int $value, int $firstKey, int $lastKey): ?int
    {
        $middleKey   = (int) (($lastKey + $firstKey) / 2);
        $middleValue = $array[$middleKey];

        if ($middleValue === $value) {
            return $middleKey;
        }

        if ($value > $middleValue) {
            $firstKey = $middleKey + 1;
        }
        else {
            $lastKey = $middleKey - 1;
        }

        if ($firstKey > $lastKey) {
            return null;
        }

        return $this->innerSearch($array, $value, $firstKey, $lastKey);
    }
}
