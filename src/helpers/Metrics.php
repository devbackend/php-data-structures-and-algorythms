<?php

declare(strict_types=1);

namespace Sandbox\helpers;

use Closure;

class Metrics
{
    public static function run(Closure $func, string $title, int $iterations = 1) {
        if ($iterations < 1) {
            return;
        }

        $runs = [];

        for ($i = 0; $i < $iterations; $i++) {
            $start = microtime(true);
            $func();

            $runs[] = round(microtime(true) - $start, 5);
        }

        $total = round(array_sum($runs), 5);
        $avg   = round($total / $iterations, 5);

        echo implode(PHP_EOL, [
            'Title: ' . $title,
            'Iters: ' . $iterations,
            'Total: ' . $total . ' s',
            'Avg:   ' . $avg . ' s',
            str_repeat('----', 10),
            null,
        ]);
    }
}
