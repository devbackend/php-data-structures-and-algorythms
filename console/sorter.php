<?php

use Sandbox\helpers\Metrics;
use Sandbox\sorts\BubbleSorter;
use Sandbox\sorts\QuickSorter;

require '../vendor/autoload.php';

define('ITEMS', 1000);
define('ITERATIONS', 1000);

$items = [];
for ($i = 0; $i < ITEMS; $i++) {
    $items[] = $i;
}

//array_reverse($items);

$quickSorter  = new QuickSorter();
$bubbleSorter = new BubbleSorter();

Metrics::run(function() use ($quickSorter, $items) {$quickSorter->sort($items);}, 'quick sort on ' . ITEMS . ' items', ITERATIONS);
Metrics::run(function() use ($bubbleSorter, $items) {$bubbleSorter->sort($items);}, 'bubble sort on ' . ITEMS . ' items', ITERATIONS);
