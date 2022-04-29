<?php
declare(strict_types = 1);

namespace Kata;

final class BundleConfigurator
{
    public function select(string $productNames): string
    {
        $products = explode(',', $productNames);

        if (count($products) === 1) {
            return $productNames;
        }

        return 'B1';
    }
}
