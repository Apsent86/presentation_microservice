<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ClickHouseEventFixtures extends Fixture
{
    const COMPANIES = ['test_comapany_1', 'test_comapany_2'];
    const NAMES     = ['game1', 'game2'];
    const ADSET     = ['qeqwe', 'qweqwe', 'qweqeqaeqew', 'qweqeqweq'];
    const PLATFORM  = ['ios', 'android'];
    const SITE_NAME = ['itstm.com', 'facebook.by'];

    const COUNT = 100_000;


    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::COUNT; $i++) {
            $event = new Event();

            $event->time        = $faker->dateTimeBetween('-30 day', 'now');
            $event->name        = $faker->name;
            $event->adsSet      = $faker->randomElement(self::ADSET);
            $event->companyName = $faker->randomElement(self::COMPANIES);
            $event->platform    = $faker->randomElement(self::PLATFORM);
            $event->siteNane    = $faker->randomElement(self::SITE_NAME);

            $manager->persist($event);
        }

        $manager->flush();
    }
}
