<?php

namespace App\Repositories;

use App\Models\Stat;
use App\Models\Campaign;
use App\Models\Term;
use App\Repositories\Interfaces\StatImportRepositoryInterface;
use Carbon\Carbon;

class StatImportRepository implements StatImportRepositoryInterface
{
    protected $model;
    protected $campaignModel;
    protected $termModel;

    /**
     * Constructor to inject models.
     *
     * @param Stat $model
     * @param Campaign $campaignModel
     * @param Term $termModel
     */
    public function __construct(Stat $model, Campaign $campaignModel, Term $termModel)
    {
        $this->model = $model;
        $this->campaignModel = $campaignModel;
        $this->termModel = $termModel;
    }

    /**
     * Import CSV data
     *
     * @param array $data CSV rows data
     */
    public function importStats(array $data)
    {
        foreach ($data as $row) {
            // Check for the NULL value
            if ($row['utm_campaign'] != 'NULL' && $row['utm_term'] != 'NULL') {
                $campaign = $this->campaignModel->where(['utm_campaign' => $row['utm_campaign']])
                    ->first();
                $term = $this->termModel->firstOrCreate(['utm_term' => $row['utm_term']]);

                //Insert record in stat table only if campaign and term exists
                if ($campaign && $term) {
                    $this->model->create([
                        'campaign_id' => $campaign->id,
                        'term_id' => $term->id,
                        'date' => date('Y-m-d', strtotime($row['monetization_timestamp'])),
                        'hour' => date('H', strtotime($row['monetization_timestamp'])),
                        'revenue' => $row['revenue'],
                    ]);
                }
            }
        }
    }
}
