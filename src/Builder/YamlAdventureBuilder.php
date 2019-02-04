<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Builder;

use Endroid\AdventureBundle\Entity\Adventure;
use Endroid\AdventureBundle\Entity\AdventureInterface;
use Endroid\AdventureBundle\Entity\Location;
use Endroid\AdventureBundle\Exception\InvalidPathException;

class YamlAdventureBuilder implements AdventureBuilderInterface
{
    private $path;

    public function setPath(string $path): void
    {
        if (!is_dir($path)) {
            throw InvalidPathException::createForPath($path);
        }
    }

    public function build(): AdventureInterface
    {

    }

    private function createLocations(): void
    {
        $locations = Yaml::parse(__DIR__.'/../Resources/demo/locations.yaml');

        dump($locations);
        die;
    }
}
