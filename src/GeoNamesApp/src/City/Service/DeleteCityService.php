<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Service;

use App\Util\Enum\StatusHttp;
use App\Util\Enum\ErrorMessage;
use GeoNamesApp\City\Exception\CityIdException;
use GeoNamesApp\City\Repository\CityRepository;
use GeoNamesApp\City\Exception\CityDatabaseException;

class DeleteCityService
{
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * @var GetCityService
     */
    private $getCityService;

    public function __construct(
        CityRepository $cityRepository,
        GetCityService $getCityService
    ) {
        $this->cityRepository = $cityRepository;
        $this->getCityService = $getCityService;
    }

    /**
     * @param int $cityId
     * @throws CityIdException
     * @throws CityDatabaseException
     */
    public function deleteCity(int $cityId): void
    {
        $city = $this->getCityService->getCityById($cityId);

        if($city) {
            $this->cityRepository->deleteCity($city);
        } else {
            throw new CityIdException(
                StatusHttp::NOT_FOUND,
                sprintf(
                    ErrorMessage::ERROR_REGISTER_NOT_FOUND,
                    $cityId
                )
            );
        }
    }
}
