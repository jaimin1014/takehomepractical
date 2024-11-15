<?php

namespace App\Services;

use App\Repositories\Interfaces\StatImportRepositoryInterface;

class ImportStatService
{
    protected $importStatRepository;

    /**
     * Constructor to inject repository.
     *
     * @param StatImportRepositoryInterface $importStatRepository
     */
    public function __construct(StatImportRepositoryInterface $importStatRepository)
    {
        $this->importStatRepository = $importStatRepository;
    }

    /**
     * Import CSV data
     *
     * @param array $data CSV rows data
     */
    public function importStats(array $data)
    {
        return $this->importStatRepository->importStats($data);
    }
}
