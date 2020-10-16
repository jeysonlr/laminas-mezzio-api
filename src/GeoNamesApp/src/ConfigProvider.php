<?php

declare(strict_types=1);

namespace GeoNamesApp;

use GeoNamesApp\City\Handler\DeleteCityHandler;
use GeoNamesApp\City\Handler\DeleteCityHandlerFactory;
use GeoNamesApp\City\Handler\GetAllCityHandler;
use GeoNamesApp\City\Handler\GetAllCityHandlerFactory;
use GeoNamesApp\City\Handler\PostCityHandler;
use GeoNamesApp\City\Handler\PostCityHandlerFactory;
use GeoNamesApp\City\Handler\PutCityHandler;
use GeoNamesApp\City\Handler\PutCityHandlerFactory;
use GeoNamesApp\City\Middleware\PostCityMiddleware;
use GeoNamesApp\City\Middleware\PostCityMiddlewareFactory;
use GeoNamesApp\City\Middleware\PutCityMiddleware;
use GeoNamesApp\City\Middleware\PutCityMiddlewareFactory;
use GeoNamesApp\City\Service\DeleteCityService;
use GeoNamesApp\City\Service\DeleteCityServiceFactory;
use GeoNamesApp\City\Service\GetCityService;
use GeoNamesApp\City\Service\GetCityServiceFactory;
use GeoNamesApp\City\Service\PostCityService;
use GeoNamesApp\City\Service\PostCityServiceFactory;
use GeoNamesApp\City\Service\PutCityService;
use GeoNamesApp\City\Service\PutCityServiceFactory;
use GeoNamesApp\City\Handler\GetCityByIdHandler;
use GeoNamesApp\City\Handler\GetCityByIdHandlerFactory;
use GeoNamesApp\State\Handler\DeleteStateHandler;
use GeoNamesApp\State\Handler\DeleteStateHandlerFactory;
use GeoNamesApp\State\Handler\GetAllStateHandler;
use GeoNamesApp\State\Handler\GetAllStateHandlerFactory;
use GeoNamesApp\State\Handler\GetStateByIdHandler;
use GeoNamesApp\State\Handler\GetStateByIdHandlerFactory;
use GeoNamesApp\State\Handler\PostStateHandler;
use GeoNamesApp\State\Handler\PostStateHandlerFactory;
use GeoNamesApp\State\Handler\PutStateHandler;
use GeoNamesApp\State\Handler\PutStateHandlerFactory;
use GeoNamesApp\State\Middleware\PostStateMiddleware;
use GeoNamesApp\State\Middleware\PostStateMiddlewareFactory;
use GeoNamesApp\State\Middleware\PutStateMiddleware;
use GeoNamesApp\State\Middleware\PutStateMiddlewareFactory;
use GeoNamesApp\State\Service\DeleteStateService;
use GeoNamesApp\State\Service\DeleteStateServiceFactory;
use GeoNamesApp\State\Service\GetStateService;
use GeoNamesApp\State\Service\GetStateServiceFactory;
use GeoNamesApp\State\Service\PostStateService;
use GeoNamesApp\State\Service\PostStateServiceFactory;
use GeoNamesApp\State\Service\PutStateService;
use GeoNamesApp\State\Service\PutStateServiceFactory;
use Mezzio\Application;

/**
 * The configuration provider for the User module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            "dependencies" => $this->getDependencies(),
            "templates" => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'delegators' => [
                Application::class => [RoutesDelegator::class]
            ],

            'invokables' => [],

            'factories' => [
                # City
                # Handler
                DeleteCityHandler::class => DeleteCityHandlerFactory::class,
                DeleteStateHandler::class => DeleteStateHandlerFactory::class,
                GetAllCityHandler::class => GetAllCityHandlerFactory::class,
                GetCityByIdHandler::class => GetCityByIdHandlerFactory::class,
                PostCityHandler::class => PostCityHandlerFactory::class,
                PutCityHandler::class => PutCityHandlerFactory::class,

                # Service
                DeleteCityService::class => DeleteCityServiceFactory::class,
                DeleteStateService::class => DeleteStateServiceFactory::class,
                GetCityService::class => GetCityServiceFactory::class,
                PostCityService::class => PostCityServiceFactory::class,
                PutCityService::class => PutCityServiceFactory::class,

                # Middleware
                PostCityMiddleware::class => PostCityMiddlewareFactory::class,
                PutCityMiddleware::class => PutCityMiddlewareFactory::class,

                # State
                # Handler
                GetAllStateHandler::class => GetAllStateHandlerFactory::class,
                GetStateByIdHandler::class => GetStateByIdHandlerFactory::class,
                PostStateHandler::class => PostStateHandlerFactory::class,
                PutStateHandler::class => PutStateHandlerFactory::class,

                # Service
                GetStateService::class => GetStateServiceFactory::class,
                PostStateService::class => PostStateServiceFactory::class,
                PutStateService::class => PutStateServiceFactory::class,

                # Middleware
                PostStateMiddleware::class => PostStateMiddlewareFactory::class,
                PutStateMiddleware::class => PutStateMiddlewareFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'geo-names-app'    => [__DIR__ . '/../templates/'],
            ],
        ];
    }
}
