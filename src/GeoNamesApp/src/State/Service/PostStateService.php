<?php

declare(strict_types=1);

namespace GeoNamesApp\State\Service;

use DateTime;
use GeoNamesApp\State\Entity\State;
use GeoNamesApp\State\Repository\StateRepository;
use GeoNamesApp\State\Exception\StateDatabaseException;

class PostStateService
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
    public function insertState(State $state): State
    {
        $state->setDatacriacao(new DateTime());
        return $this->stateRepository->insertState($state);
    }
}
