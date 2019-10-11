<?php

declare(strict_types=1);

namespace Sandbox\search;

class ExponentialSearcher extends AbstractSearcher
{
    /** * @var BinarySearcher */
    private $binarySearcher;

    public function __construct(BinarySearcher $binarySearcher)
    {
        $this->binarySearcher = $binarySearcher;
    }


    /**
     * {@inheritdoc}
     */
    public function search(int $value, array $array): ?int
    {
        if ($value === $array[0]) {
            return 0;
        }

        $lastKey = count($array) - 1;
        if ($value === $array[$lastKey]) {
            return $lastKey;
        }

        $range = 1;

        while ($range < count($array) && $array[$range] <= $value) {
            $range *= 2;
        }

        $start = (int)($range / 2);

        $index = $this->binarySearcher->search(
            $value,
            array_slice(
                $array,
                $start,
                min($range, count($array))
            )
        );

        return (null !== $index ? $start + $index : null);
    }
}
