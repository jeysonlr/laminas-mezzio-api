<?php

declare(strict_types=1);

namespace GeoNamesApp\City\Service;

use Datetime;
use GeoNamesApp\City\Entity\City;
use GeoNamesApp\City\Repository\CityRepository;
use GeoNamesApp\City\Exception\CityDatabaseException;

class PutCityService
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
    public function updateCity(City $city): City
    {
        $databaseCity = $this->cityRepository->findByCityId($city->getCidadeid());

        $databaseCity->setNome(strtoupper($city->getNome()));
        $databaseCity->setEstadoid($city->getEstadoid());
        $databaseCity->setDatacriacao($databaseCity->getDatacriacao());
        $databaseCity->setDataalteracao(new DateTime());

        return $this->cityRepository->updateCity($databaseCity);
    }
}