<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Service;

use Doctrine\ORM\EntityManager;
use GeoNamesApp\State\Entity\State;
use Psr\Container\ContainerInterface;

class PostStateServiceFactory
{
    public function __invoke(ContainerInterface $container): PostStateService
    {
        $entityManager = $container->get(EntityManager::class);
        $stateRepository = $entityManager->getRepository(State::class);
        return new PostStateService(
            $stateRepository
        );
    }
}