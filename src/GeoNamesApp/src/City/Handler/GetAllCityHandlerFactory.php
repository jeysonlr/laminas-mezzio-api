<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Handler;

use Psr\Container\ContainerInterface;
use GeoNamesApp\City\Service\GetCityService;

class GetAllCityHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetAllCityHandler
    {
        $getCity = $container->get(GetCityService::class);
        return new GetAllCityHandler($getCity);
    }
}
