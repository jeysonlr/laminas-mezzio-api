<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Service;

use Doctrine\ORM\EntityManager;
use GeoNamesApp\State\Entity\State;
use Psr\Container\ContainerInterface;

class DeleteStateServiceFactory
{
    public function __invoke(ContainerInterface $container): DeleteStateService
    {
        $entityManager = $container->get(EntityManager::class);
        $stateRepository = $entityManager->getRepository(State::class);
        $getStateService = $container->get(GetStateService::class);
        return new DeleteStateService(
            $stateRepository,
            $getStateService
        );
    }
}