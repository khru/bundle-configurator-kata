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

       /* $bundleProducts = [
            'B1' => ['P1', 'P2'],
            'B2' => ['P1', 'P4'],
            'B3' => ['P3', 'P4'],
            'B4' => ['P1', 'P2', 'P3', 'P4'],
            'B5' => ['P1', 'P5']
        ];*/

        if (in_array('P1', $products, true) && in_array('P2', $products, true)) {
            return 'B1';
        }

        if (in_array('P3', $products, true) && in_array('P4', $products, true)) {
            return 'B3';
        }

        return 'B2';
    }
}
