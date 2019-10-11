<?php

declare(strict_types=1);

namespace Sandbox;

use Sandbox\search\AbstractSearcher;
use Sandbox\search\BinarySearcher;
use Sandbox\search\strategies\binary\IterateBinarySearchStrategy;

class BinarySearcherIterateStrategyTest extends SearcherTestCase
{
    protected function getSearcher(): AbstractSearcher
    {
        return new BinarySearcher(new IterateBinarySearchStrategy());
    }
}
