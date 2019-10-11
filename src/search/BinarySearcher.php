<?php

declare(strict_types=1);

namespace Sandbox\search;

use Sandbox\search\strategies\binary\AbstractBinarySearchStrategy;

class BinarySearcher extends AbstractSearcher
{
    /** * @var AbstractBinarySearchStrategy */
    private $strategy;

    public function __construct(AbstractBinarySearchStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * {@inheritdoc}
     */
    public function search(int $value, array $array): ?int
    {
        return $this->strategy->search($value, $array);
    }
}
