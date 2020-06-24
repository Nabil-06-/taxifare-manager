<?php

namespace App\DataFixtures;

use App\Entity\Ride;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ride = new Ride();
        $ride
            ->setName("Paris - Versailles")
            ->setDistance(2)
            ->setDuration(4000)
            ->setStatus("done");

        $manager->persist($ride);

        // create 10 Ride! Bam!
        for ($i = 0; $i < 10; $i++) {
            $ride = new Ride();
            $ride
               ->setName("Ride " . $i)
               ->setDistance(mt_rand(1, 5))
               ->setDuration(mt_rand(1000, 7000))
               ->setStatus("done");

            $manager->persist($ride);
        }

        $manager->flush();
    }
}
