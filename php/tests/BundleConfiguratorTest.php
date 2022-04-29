<?php
declare(strict_types = 1);

namespace KataTests;

use Kata\BundleConfigurator;
use PHPUnit\Framework\TestCase;

final class BundleConfiguratorTest extends TestCase
{
    public function test_selected_one_item(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P1', $bundleConfigurator->select('P1'));
    }

    public function test_selected_a_different_item(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P2', $bundleConfigurator->select('P2'));
    }

    public function test_created_bundle_b1(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B1', $bundleConfigurator->select('P1,P2'));
    }

    public function test_selected_multiple_times_same_item(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P1,P1', $bundleConfigurator->select('P1,P1'));
    }

    public function test_created_bundle_b2(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B2', $bundleConfigurator->select('P1,P4'));
    }
}

/**
| product | single price |
|---------|--------------|
| P1      | 10 EUR       |
| P2      | 20 EUR       |
| P3      | 30 EUR       |
| P4      | 40 EUR       |
| P5      | 50 EUR       |

--------

| bundle | products    | bundle price | original price |
|--------|-------------|--------------|----------------|
| B1     | P1,P2       | 25 EUR       | 30 EUR         |
| B2     | P1,P4       | 40 EUR       | 50 EUR         |
| B3     | P3,P4       | 60 EUR       | 70 EUR         |
| B4     | P1,P2,P3,P4 | 80 EUR       | 100 EUR        |
| B5     | P1,P5       | 50 EUR       | 60 EUR         |

 --------

| select      | result         |
|-------------|----------------|
| P1          | P1             |
| P1,P2       | B1             |
| P2,P1       | B1             |
| P1,P2,P3    | B1,P3          |
| P1,P3,P4    | P1,B3          |
| P1,P2,P3,P4 | B4             |
| P2,P4       | P2,P4          |
| P2,P3,P4    | P2,B3          |
| P3,P4       | B3             |
 */