<?php

declare(strict_types=1);

namespace Sandbox\search\strategies\binary;

abstract class AbstractBinarySearchStrategy
{
    /**
     * @param int   $value
     * @param int[] $array
     *
     * @return int|null
     */
    abstract public function search(int $value, array $array): ?int;
}
