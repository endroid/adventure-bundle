<?php

declare(strict_types=1);

namespace Endroid\AdventureBundle\DataFixtures;

use App\Entity\Example;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Endroid\AdventureBundle\Entity\Location;
use Symfony\Component\Yaml\Yaml;

class LocationFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $data = Yaml::parse((string) file_get_contents(__DIR__.'/data/locations.yaml'));

        foreach ($data['locations'] as $key => $item) {
            $location = new Location($item['name'], $item['name']);
            $this->addReference($key, $location);
            $manager->persist($location);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 5; // No dependencies
    }
}
