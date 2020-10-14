<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Handler;

use Psr\Container\ContainerInterface;
use GeoNamesApp\City\Service\GetCityService;

class GetCityByIdHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetCityByIdHandler
    {
        $getCity = $container->get(GetCityService::class);
        return new GetCityByIdHandler(
            $getCity
        );
    }
}
