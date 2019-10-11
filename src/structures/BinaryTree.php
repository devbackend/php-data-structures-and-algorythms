<?php

declare(strict_types=1);

namespace Sandbox\structures;

class BinaryTree
{
    /** @var int */
    private $value;

    /** @var BinaryTree|null */
    private $left;

    /** @var BinaryTree|null */
    private $right;

    /** @var BinaryTree|null */
    private $parent;

    public function __construct(int $value, ?BinaryTree $parent = null)
    {
        $this->value  = $value;
        $this->parent = $parent;
    }

    /**
     * Добавление значения в
     *
     * @param int $value
     */
    public function add(int $value)
    {
        $this->innerAdd($this, $value);
    }

    /**
     * @param int $int
     *
     * @return BinaryTree|null
     */
    public function find(int $int): ?BinaryTree
    {
        return $this->innerFind($this, $int);
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return BinaryTree|null
     */
    public function getLeft(): ?BinaryTree
    {
        return $this->left;
    }

    /**
     * @return BinaryTree|null
     */
    public function getRight(): ?BinaryTree
    {
        return $this->right;
    }

    /**
     * @return BinaryTree|null
     */
    public function getParent(): ?BinaryTree
    {
        return $this->parent;
    }

    /**
     * @return int
     */
    public function min(): int
    {
        if (null === $this->left) {
            return $this->value;
        }

        return $this->left->min();
    }

    /**
     * @return int
     */
    public function max(): int
    {
        if (null === $this->right) {
            return $this->value;
        }

        return $this->right->max();
    }

    /**
     * @param BinaryTree $context
     * @param int        $value
     */
    private function innerAdd(BinaryTree $context, int $value)
    {
        if ($value >= $context->value) {
            if (null !== $context->right) {
                $context->innerAdd($context->right, $value);

                return;
            }

            $context->right = new BinaryTree($value, $context);
        }
        else {
            if (null !== $context->left) {
                $context->innerAdd($context->left, $value);

                return;
            }

            $context->left = new BinaryTree($value, $context);
        }
    }

    /**
     * @param BinaryTree|null $context
     * @param int             $value
     *
     * @return BinaryTree|null
     */
    private function innerFind(?BinaryTree $context, int $value): ?BinaryTree
    {
        if (null === $context) {
            return null;
        }

        if ($context->value === $value) {
            return $context;
        }

        return ($value > $context->value
            ? $this->innerFind($context->right, $value)
            : $this->innerFind($context->left, $value)
        );
    }
}
