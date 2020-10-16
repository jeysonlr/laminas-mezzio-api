<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Service;

use Datetime;
use GeoNamesApp\State\Entity\State;
use GeoNamesApp\State\Repository\StateRepository;
use GeoNamesApp\State\Exception\StateDatabaseException;

class PutStateService
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
     * @param State $state
     * @return State
     * @throws StateDatabaseException
     */
    public function updateState(State $state): State
    {
        $databaseState = $this->stateRepository->findByStateId($state->getEstadoid());

        $databaseState->setNome(strtoupper($state->getNome()));
        $databaseState->setAbreviacao(strtoupper($state->getAbreviacao()));
        $databaseState->setDatacriacao($databaseState->getDatacriacao());
        $databaseState->setDataalteracao(new DateTime());

        return $this->stateRepository->updateState($databaseState);
    }
}
