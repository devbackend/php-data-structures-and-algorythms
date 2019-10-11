<?php

declare(strict_types=1);

namespace Sandbox\search;

class LinearSearcher extends AbstractSearcher
{
    public function search(int $value, array $array): ?int
    {
        foreach ($array as $key => $item) {
            if ($item === $value) {
                return $key;
            }
        }

        return null;
    }
}
