<?php

declare(strict_types=1);

namespace Sandbox;

use Sandbox\sorts\AbstractSorter;
use Sandbox\sorts\BubbleSorter;

class BubbleSorterTest extends SortTestCase
{
    protected function getSorter(): AbstractSorter
    {
        return new BubbleSorter();
    }
}
