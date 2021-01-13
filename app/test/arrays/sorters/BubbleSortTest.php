<?php

declare(strict_types=1);

namespace Test\Arrays\Sorters;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use App\Arrays\Sorters\BubbleSort;
use App\Arrays\Sorters\SorterInterface;


class BubbleSortTest extends TestCase
{
    public static function test_BubbleSortInstance_shouldImplementsSorterInterface(): void
    {
        Assert::assertInstanceOf(SorterInterface::class, new BubbleSort);
    }

    public static function test_sortFunction_shouldOrderList(): void
    {
        Assert::assertEquals($expectedList = [1, 2, 3, 4, 5], $receivedList = BubbleSort::sort([5, 4, 3, 2, 1]));
        Assert::assertEquals(count($expectedList), count($receivedList));
    }

    public static function test_sortRecursiveFunction_shouldOrderList(): void
    {
        Assert::assertEquals($expectedList = [1, 2, 3, 4, 5], $receivedList = BubbleSort::sortRecursive([5, 4, 3, 2, 1], 4));
        Assert::assertEquals(count($expectedList), count($receivedList));
    }
}
