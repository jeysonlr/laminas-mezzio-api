<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Service;

use App\Exception\SQLFileNotFoundException;
use GeoNamesApp\State\Entity\State;
use GeoNamesApp\State\Repository\StateRepository;
use GeoNamesApp\State\Exception\StateDatabaseException;

class GetStateService
{
    /**
     * @var StateRepository
     */
    private $stateRepository;

    public function __construct(
        StateRepository $stateRepository
    ) {
        $this->stateRepository = $stateRepository;
    }

    /**
     * @param int $stateId
     * @return array|null
     * @throws StateDatabaseException
     */
    public function getStateById(int $stateId): ?State
    {
        return $this->stateRepository->findByStateId($stateId);
    }

    /**
     * @return array|null
     * @throws StateDatabaseException
     */
    public function getAllStates(): ?array
    {
        return $this->stateRepository->findAllStates();
    }

    /**
     * @param string $stateName
     * @return array|null
     * @throws StateDatabaseException
     * @throws SQLFileNotFoundException
     */
    public function getStateByName(string $stateName): ?array
    {
        return $this->stateRepository->findStateByName($stateName);
    }
}
