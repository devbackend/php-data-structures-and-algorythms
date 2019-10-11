<?php

declare(strict_types=1);

namespace Sandbox;

use Sandbox\search\AbstractSearcher;
use Sandbox\search\BinarySearcher;
use Sandbox\search\ExponentialSearcher;
use Sandbox\search\strategies\binary\IterateBinarySearchStrategy;

class ExponentialSearcherTest extends SearcherTestCase
{
    protected function getSearcher(): AbstractSearcher
    {
        return new ExponentialSearcher(new BinarySearcher(new IterateBinarySearchStrategy()));
    }
}
