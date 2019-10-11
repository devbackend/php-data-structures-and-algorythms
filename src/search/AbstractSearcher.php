<?php

declare(strict_types=1);

namespace Sandbox\search;

abstract class AbstractSearcher
{
    /**
     * @param int   $value
     * @param int[] $array
     *
     * @return int|null
     */
    abstract public function search(int $value, array $array): ?int;
}
