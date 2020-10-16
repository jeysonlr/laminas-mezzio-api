<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Handler;

use Psr\Container\ContainerInterface;
use GeoNamesApp\State\Service\DeleteStateService;

class DeleteStateHandlerFactory
{
    public function __invoke(ContainerInterface $container): DeleteStateHandler
    {
        $deleteStateService = $container->get(DeleteStateService::class);
        return new DeleteStateHandler(
            $deleteStateService
        );
    }
}
