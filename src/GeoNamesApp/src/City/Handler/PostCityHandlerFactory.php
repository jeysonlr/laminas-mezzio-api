<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Handler;

use GeoNamesApp\City\Service\PostCityService;
use Psr\Container\ContainerInterface;

class PostCityHandlerFactory
{
    public function __invoke(ContainerInterface $container): PostCityHandler
    {
        $getCity = $container->get(PostCityService::class);
        return new PostCityHandler(
            $getCity
        );
    }
}
