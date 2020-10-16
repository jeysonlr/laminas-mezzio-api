<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Service;

use Doctrine\ORM\EntityManager;
use GeoNamesApp\City\Entity\City;
use Psr\Container\ContainerInterface;

class DeleteCityServiceFactory
{
    public function __invoke(ContainerInterface $container): DeleteCityService
    {
        $entityManager = $container->get(EntityManager::class);
        $cityRepository = $entityManager->getRepository(City::class);
        $getCityService = $container->get(GetCityService::class);
        return new DeleteCityService(
            $cityRepository,
            $getCityService
        );
    }
}