<?php
declare(strict_types=1);

namespace Kata;

final class BundleConfigurator
{
    public function select(string $productNames): string
    {
        $products = explode(',', $productNames);

        if (count(array_unique($products)) === 1) {
            return $productNames;
        }

        $bundleProducts = [
            'B1' => ['P1', 'P2'],
            'B2' => ['P1', 'P4'],
            'B3' => ['P3', 'P4'],
            'B4' => ['P1', 'P2', 'P3', 'P4'],
            'B5' => ['P1', 'P5'],
        ];

        return array_search($products, $bundleProducts, true);
    }
}
