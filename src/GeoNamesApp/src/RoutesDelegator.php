<?php

declare(strict_types=1);

namespace GeoNamesApp;

use GeoNamesApp\State\Handler\GetAllStateHandler;
use GeoNamesApp\State\Handler\GetStateByIdHandler;
use GeoNamesApp\State\Handler\PostStateHandler;
use GeoNamesApp\State\Handler\PutStateHandler;
use GeoNamesApp\State\Middleware\PostStateMiddleware;
use GeoNamesApp\State\Middleware\PutStateMiddleware;
use Mezzio\Application;
use Psr\Container\ContainerInterface;
use GeoNamesApp\City\Handler\PutCityHandler;
use GeoNamesApp\City\Handler\PostCityHandler;
use GeoNamesApp\City\Handler\GetAllCityHandler;
use GeoNamesApp\City\Handler\GetCityByIdHandler;
use GeoNamesApp\City\Middleware\PutCityMiddleware;
use GeoNamesApp\City\Middleware\PostCityMiddleware;

class RoutesDelegator
{
    /**
     * @param ContainerInterface $container
     * @param string $serviceName
     * @param callable $callback
     * @return Application
     */
    public function __invoke(ContainerInterface $container, string $serviceName, callable $callback): Application
    {
        /**
         * @var Application $app
         */
        $app = $callback();

         $app->post("/v1/cidades", [
             PostCityMiddleware::class,
             PostCityHandler::class,
         ], "post.city");

         $app->put("/v1/cidade/{cidadeId:\d+}", [
             PutCityMiddleware::class,
             PutCityHandler::class,
         ], "put.city");

        $app->get("/v1/cidades", [
            GetAllCityHandler::class,
        ], "get.all_city");

        $app->get("/v1/cidade/{cidadeId:\d+}", [
            GetCityByIdHandler::class,
        ], "get.city_byid");

        $app->post("/v1/estados", [
             PostStateMiddleware::class,
             PostStateHandler::class,
         ], "post.state");

         $app->put("/v1/estado/{estadoId:\d+}", [
             PutStateMiddleware::class,
             PutStateHandler::class,
         ], "put.state");

        $app->get("/v1/estados", [
            GetAllStateHandler::class,
        ], "get.all_state");

        $app->get("/v1/estado/{estadoId:\d+}", [
            GetStateByIdHandler::class,
        ], "get.state_byid");

        return $app;
    }
}