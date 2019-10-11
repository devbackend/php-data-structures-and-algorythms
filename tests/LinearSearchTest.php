<?php

declare(strict_types=1);

namespace Sandbox;

use Sandbox\search\AbstractSearcher;
use Sandbox\search\LinearSearcher;

class LinearSearchTest extends SearcherTestCase
{
    protected function getSearcher(): AbstractSearcher
    {
        return new LinearSearcher();
    }
}
