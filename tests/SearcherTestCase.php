<?php

declare(strict_types=1);

namespace Sandbox;

use PHPUnit\Framework\TestCase;
use Sandbox\search\AbstractSearcher;

/**
 *
 */
abstract class SearcherTestCase extends TestCase
{
    /**
     * @return AbstractSearcher
     */
    abstract protected function getSearcher(): AbstractSearcher;

    public function testSearch()
    {
        self::assertEquals(7, $this->getSearcher()->search(55, [1, 3, 5, 8, 13, 21, 34, 55, 89]));
        self::assertNull($this->getSearcher()->search(700, [3, 2, 1, 2, 9, 8, 7, 6, 5, 4]));
    }
}
