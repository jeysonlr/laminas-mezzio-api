<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Service;

use Doctrine\ORM\EntityManager;
use GeoNamesApp\State\Entity\State;
use Psr\Container\ContainerInterface;

class GetStateServiceFactory
{
    public function __invoke(ContainerInterface $container): GetStateService
    {
        $entityManager = $container->get(EntityManager::class);
        $stateRepository = $entityManager->getRepository(State::class);
        return new GetStateService(
            $stateRepository
        );
    }
}
