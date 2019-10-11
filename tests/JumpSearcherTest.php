<?php

declare(strict_types=1);

namespace Sandbox;

use Sandbox\search\AbstractSearcher;
use Sandbox\search\JumpSearcher;

class JumpSearcherTest extends SearcherTestCase
{
    protected function getSearcher(): AbstractSearcher
    {
        return new JumpSearcher();
    }
}
