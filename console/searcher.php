<?php

use Sandbox\helpers\Metrics;
use Sandbox\search\BinarySearcher;
use Sandbox\search\ExponentialSearcher;
use Sandbox\search\JumpSearcher;
use Sandbox\search\LinearSearcher;
use Sandbox\search\strategies\binary\IterateBinarySearchStrategy;
use Sandbox\search\strategies\binary\RecursiveBinarySearchStrategy;

require '../vendor/autoload.php';

define('MAX', 1000000);
define('ITERATIONS', 1000);

$items = [];
for ($i = 0; $i < MAX; $i++) {
    $items[] = $i;
}

$linearSearcher          = new LinearSearcher();
$binarySearcherIterative = new BinarySearcher(new IterateBinarySearchStrategy());
$binarySearcherRecursive = new BinarySearcher(new RecursiveBinarySearchStrategy());
$jumpSearcher            = new JumpSearcher();
$exponentialSearcher     = new ExponentialSearcher($binarySearcherIterative);

$find = MAX - 117;

Metrics::run(function() use ($linearSearcher, $items, $find) {$linearSearcher->search($find, $items);}, 'linear search on ' . MAX . ' elements', ITERATIONS);
Metrics::run(function() use ($binarySearcherIterative, $items, $find) {$binarySearcherIterative->search($find, $items);}, 'binary search: iterative on ' . MAX . ' elements', ITERATIONS);
Metrics::run(function() use ($binarySearcherRecursive, $items, $find) {$binarySearcherRecursive->search($find, $items);}, 'binary search: recursive on ' . MAX . ' elements', ITERATIONS);
Metrics::run(function() use ($jumpSearcher, $items, $find) {$jumpSearcher->search($find, $items);}, 'jump search on ' . MAX . ' elements', ITERATIONS);
Metrics::run(function() use ($exponentialSearcher, $items, $find) {$exponentialSearcher->search($find, $items);}, 'exponential search on ' . MAX . ' elements', ITERATIONS);
