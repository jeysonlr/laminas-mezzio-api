<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Handler;

use GeoNamesApp\State\Service\PutStateService;
use Psr\Container\ContainerInterface;

class PutStateHandlerFactory
{
    public function __invoke(ContainerInterface $container): PutStateHandler
    {
        $putCity = $container->get(PutStateService::class);
        return new PutStateHandler(
            $putCity
        );
    }
}
