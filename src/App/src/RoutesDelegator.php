<?php

// declare(strict_types=1);

// namespace App;

// use App\City\Handler\GetAllCityHandler;
// use Mezzio\Application;
// use Psr\Container\ContainerInterface;

// class RoutesDelegator
// {
//     /**
//      * @param ContainerInterface $container
//      * @param string $serviceName
//      * @param callable $callback
//      * @return Application
//      */
//     public function __invoke(ContainerInterface $container, string $serviceName, callable $callback): Application
//     {
//         /** @var Application $app */
//         $app = $callback();

//         // $app->post("/v1/usuarios", [
//         //     PostUserValidationMiddleware::class,
//         //     PostUserHandler::class,
//         // ], "user.post_users");

//         // # Rota de uso da API (não documentar)
//         // $app->post("/v1/usuarios/verificacoes", [
//         //     PostCheckUserMiddleware::class,
//         //     PostCheckUserHandler::class,
//         // ], "user.post_validate_user");

//         // $app->post("/v1/usuarios/acoes", [
//         //     PostActionsValidationMiddleware::class,
//         //     PostActionsHandler::class,
//         // ], "user.post_actions");

//         // $app->put("/v1/usuarios/acoes/{idAction:\d+}", [
//         //     PutActionsValidationMiddleware::class,
//         //     PutActionsHandler::class,
//         // ], "user.put_actions");

//         // $app->put("/v1/usuarios/{idUserPayer:\d+}", [
//         //     PutUserValidationMiddleware::class,
//         //     PutUserHandler::class,
//         // ], "user.put_users_by_id");
// die('aaaaaa');
//         $app->get("/v1/cidades", [
//             GetAllCityHandler::class,
//         ], "user.get_all_users");

//         // $app->get("/v1/usuarios/{idUserPayer:\d+}", [
//         //     GetUserByIdHandler::class,
//         // ], "user.get_users_by_id");

//         // $app->get("/v1/usuarios/acoes", [
//         //     GetAllActionsHandler::class,
//         // ], "user.get_all_actions");

//         return $app;
//     }
// }