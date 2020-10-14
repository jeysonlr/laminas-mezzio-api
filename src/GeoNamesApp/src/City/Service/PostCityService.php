<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Service;

use DateTime;
use GeoNamesApp\City\Entity\City;
use GeoNamesApp\City\Repository\CityRepository;
use GeoNamesApp\City\Exception\CityDatabaseException;

class PostCityService
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
     * @param City $city
     * @return City
     * @throws CityDatabaseException
     */
    public function insertCity(City $city): City
    {
        $city->setDatacriacao(new DateTime());
        return $this->cityRepository->insertCity($city);
    }
}
