<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Service;

use GeoNamesApp\City\Entity\City;
use App\Exception\SQLFileNotFoundException;
use GeoNamesApp\City\Repository\CityRepository;
use GeoNamesApp\City\Exception\CityDatabaseException;

class GetCityService
{
    /**
     * @var CityRepository
     */
    private $cityRepository;

    public function __construct(
        CityRepository $cityRepository
    ) {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @param int $cityId
     * @return array|null
     * @throws CityDatabaseException
     */
    public function getCityById(int $cityId): ?City
    {
        return $this->cityRepository->findByCityId($cityId);
    }

    /**
     * @return array|null
     * @throws CityDatabaseException
     */
    public function getAllCitys(): ?array
    {
        return $this->cityRepository->findAllCitys();
    }

    /**
     * @param string $name
     * @return array|null
     * @throws CityDatabaseException
     * @throws SQLFileNotFoundException
     */
    public function getCityByName(string $name): ?array
    {
        return $this->cityRepository->findCityByName($name);
    }
}
