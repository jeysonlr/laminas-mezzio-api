<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Service;

use Doctrine\ORM\EntityManager;
use GeoNamesApp\City\Entity\City;
use Psr\Container\ContainerInterface;

class PostCityServiceFactory
{
    public function __invoke(ContainerInterface $container): PostCityService
    {
        $entityManager = $container->get(EntityManager::class);
        $cityRepository = $entityManager->getRepository(City::class);
        return new PostCityService(
            $cityRepository
        );
    }
}