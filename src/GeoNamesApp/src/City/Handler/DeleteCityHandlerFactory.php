<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Handler;

use GeoNamesApp\City\Service\DeleteCityService;
use Psr\Container\ContainerInterface;

class DeleteCityHandlerFactory
{
    public function __invoke(ContainerInterface $container): DeleteCityHandler
    {
        $deleteCityService = $container->get(DeleteCityService::class);
        return new DeleteCityHandler(
            $deleteCityService
        );
    }
}
