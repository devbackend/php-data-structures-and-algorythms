<?php

declare(strict_types=1);

namespace Sandbox\search;

class JumpSearcher extends AbstractSearcher
{
    public function search(int $value, array $array): ?int
    {
        $size     = count($array);
        $step     = (int)sqrt($size);
        $previous = 0;

        while ($array[min($step, $size) - 1] < $value) {
            $previous = $step;
            $step += (int)sqrt($size);
            if ($previous >= $size) {
                return null;
            }
        }

        while ($array[$previous] < $value) {
            $previous++;
            if ($previous === min($step, $size)) {
                return null;
            }
        }

        return ($array[$previous] === $value ? $previous : null);
    }
}
