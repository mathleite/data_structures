<?php

declare(strict_types=1);

namespace App\Arrays\Sorters;

use App\Arrays\Sorters\SorterInterface;

final class BubbleSort implements SorterInterface
{
    public static function sort(array $list): array
    {
        $count = 0;
        $listCopy = $list;
        $has_swap = true;

        while ($has_swap) {
            $has_swap = false;
            for ($key = 0; $key < count($listCopy); $key++) {
                $nextPosition = array_key_exists($key + 1, $listCopy)
                    ? $key + 1
                    : null;

                $nextItem = $listCopy[$nextPosition] ?? null;
                $currentItem = $listCopy[$key];

                if (!is_null($nextItem) && $currentItem > $nextItem) {
                    $aux = $nextItem;
                    $listCopy[$nextPosition] = $currentItem;
                    $listCopy[$key] = $aux;
                    $has_swap = true;
                }
            }
        }

        return $listCopy;// O(n^2)
    }

    public static function sortRecursive(array $list, int $currentListLength): array
    {
        $listCopy = $list;
        if ($currentListLength < 1) {
            return $listCopy;
        }

        for ($index = 0; $index < $currentListLength; $index++) {
            $nextPosition = array_key_exists($index + 1, $listCopy)
                ? $index + 1
                : null;

            $nextItem = $listCopy[$nextPosition] ?? null;
            $currentItem = $listCopy[$index];

            if (!is_null($nextItem) && $currentItem > $nextItem) {
                $aux = $nextItem;
                $listCopy[$nextPosition] = $currentItem;
                $listCopy[$index] = $aux;
            }
        }

        return self::sortRecursive($listCopy, $currentListLength - 1);// O(n*2)
    }
}
