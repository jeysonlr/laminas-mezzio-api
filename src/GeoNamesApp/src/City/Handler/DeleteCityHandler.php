<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Handler;

use Exception;
use App\Util\Enum\StatusHttp;
use App\Util\Enum\SuccessMessage;
use App\Service\Response\ApiResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use GeoNamesApp\City\Exception\CityIdException;
use GeoNamesApp\City\Service\DeleteCityService;
use GeoNamesApp\City\Exception\CityDatabaseException;

class DeleteCityHandler implements RequestHandlerInterface
{
    /**
     * @var DeleteCityService
     */
    private $deleteCityService;

    public function __construct(
        DeleteCityService $deleteCityService
    ) {
        $this->deleteCityService = $deleteCityService;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $cityId = intval($request->getAttribute("cidadeId"));

            $this->deleteCityService->deleteCity($cityId);

            return new ApiResponse(
                sprintf(
                    SuccessMessage::DELETING_RECORD,
                    $cityId
                ),
                StatusHttp::OK,
                ApiResponse::SUCCESS
            );
        } catch (CityDatabaseException $e) {
            return new ApiResponse($e->getCustomError(), $e->getCode(), ApiResponse::ERROR);
        } catch (CityIdException $e) {
            return new ApiResponse($e->getCustomError(), $e->getCode(), ApiResponse::ERROR);
        } catch (Exception $e) {
            return new ApiResponse($e->getMessage(), $e->getCode(), ApiResponse::ERROR);
        }
    }
}
