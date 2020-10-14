<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Handler;

use Psr\Container\ContainerInterface;
use GeoNamesApp\State\Service\GetStateService;

class GetStateByIdHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetStateByIdHandler
    {
        $getState = $container->get(GetStateService::class);
        return new GetStateByIdHandler(
            $getState
        );
    }
}
