<?php

declare(strict_types=1);

namespace Sandbox;

use PHPUnit\Framework\TestCase;
use Sandbox\structures\BinaryTree;

class BinaryTreeTest extends TestCase
{
    public function testBuildWithLeafs()
    {
        $root = new BinaryTree(2);

        $root->add(1);
        $root->add(3);

        self::assertNotNull($root->getLeft());
        self::assertNotNull($root->getRight());

        self::assertEquals(1, $root->getLeft()->getValue());
        self::assertEquals(3, $root->getRight()->getValue());

        self::assertEquals($root, $root->getLeft()->getParent());
        self::assertEquals($root, $root->getRight()->getParent());
    }

    public function testBuildWithSameValues()
    {
        $root = new BinaryTree(2);

        $root->add(2);

        self::assertNull($root->getLeft());
        self::assertNotNull($root->getRight());

        self::assertEquals(2, $root->getRight()->getValue());
    }

    public function testBuildWithThirdLevel()
    {
        $root = new BinaryTree(3);

        $root->add(1);
        $root->add(2);
        $root->add(4);
        $root->add(5);

        self::assertNotNull($root->getLeft());
        self::assertNotNull($root->getRight());
        self::assertEquals(1, $root->getLeft()->getValue());
        self::assertEquals(4, $root->getRight()->getValue());

        self::assertNotNull($root->getLeft()->getRight());
        self::assertNotNull($root->getRight()->getRight());
        self::assertEquals(2, $root->getLeft()->getRight()->getValue());
        self::assertEquals(5, $root->getRight()->getRight()->getValue());
    }

    public function testBuildMoreElement()
    {
        $tree = new BinaryTree(33);

        foreach ([5, 35, 1, 20, 99, 17, 18, 19, 31, 4] as $number) {
            $tree->add($number);
        }

        self::assertEquals(5, $tree->getLeft()->getValue());
        self::assertEquals(1, $tree->getLeft()->getLeft()->getValue());
        self::assertEquals(4, $tree->getLeft()->getLeft()->getRight()->getValue());
        self::assertEquals(20, $tree->getLeft()->getRight()->getValue());

        self::assertEquals(35, $tree->getRight()->getValue());
        self::assertEquals(99, $tree->getRight()->getRight()->getValue());
    }

    public function testFindValue()
    {
        $tree = new BinaryTree(33);

        foreach ([5, 35, 1, 20, 99, 17, 18, 19, 31, 4] as $number) {
            $tree->add($number);
        }

        self::assertEquals(18, $tree->find(18)->getValue());
    }

    public function testFindAbsentValue()
    {
        $tree = new BinaryTree(33);

        foreach ([5, 35, 1, 20, 99, 17, 18, 19, 31, 4] as $number) {
            $tree->add($number);
        }

        self::assertNull($tree->find(100));
    }

    public function testMinAndMax()
    {
        $tree = new BinaryTree(33);

        foreach ([5, 35, 1, 20, 99, 17, 18, 19, 31, 4] as $number) {
            $tree->add($number);
        }

        self::assertEquals(1, $tree->min());
        self::assertEquals(99, $tree->max());
    }
}
