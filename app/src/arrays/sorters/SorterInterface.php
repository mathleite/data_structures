<?php

declare(strict_types=1);

namespace App\Arrays\Sorters;

interface SorterInterface
{
    public static function sort(array $list): array;
    public static function sortRecursive(array $list, int $currentListLength): array;
}
