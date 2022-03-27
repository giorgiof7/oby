<?php

namespace App\DataFixtures;

use App\Factory\WeightingFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        WeightingFactory::createMany(20);

        WeightingFactory::new()
            ->firstMeasurement()
            ->create();
    }
}
