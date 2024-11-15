<?php

namespace App\Repositories\Interfaces;

interface StatImportRepositoryInterface
{
    /**
     * Import CSV data
     *
     * @param array $data CSV rows data
     */
    public function importStats(array $data);
}