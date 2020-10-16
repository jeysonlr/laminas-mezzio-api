<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Middleware;

use App\Util\Serialize\SerializeUtil;
use Psr\Container\ContainerInterface;
use App\Util\Validation\ValidationService;
use GeoNamesApp\State\Service\GetStateService;

class PutStateMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): PutStateMiddleware
    {
        $serialize = $container->get(SerializeUtil::class);
        $validationService = $container->get(ValidationService::class);
        $getCityService = $container->get(GetStateService::class);
        return new PutStateMiddleware(
            $serialize,
            $validationService,
            $getCityService
        );
    }
}
