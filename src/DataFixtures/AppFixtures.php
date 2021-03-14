<?php

namespace App\DataFixtures;

use App\Factory\WeighingFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        WeighingFactory::createMany(20);

        WeighingFactory::new()
            ->firstMeasurement()
            ->create();
    }
}
