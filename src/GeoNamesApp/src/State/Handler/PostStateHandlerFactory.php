<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Handler;

use GeoNamesApp\State\Service\PostStateService;
use Psr\Container\ContainerInterface;

class PostStateHandlerFactory
{
    public function __invoke(ContainerInterface $container): PostStateHandler
    {
        $postState = $container->get(PostStateService::class);
        return new PostStateHandler(
            $postState
        );
    }
}