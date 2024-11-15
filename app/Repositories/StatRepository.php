<?php

namespace App\Repositories;

use App\Models\Campaign;
use App\Models\Stat;
use App\Repositories\Interfaces\StatRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StatRepository implements StatRepositoryInterface
{
    protected $model;
    protected $statModel;

    /**
     * Constructor to inject models.
     *
     * @param Campaign $model
     * @param Stat $statModel
     */
    public function __construct(Campaign $model, Stat $statModel)
    {
        $this->model = $model;
        $this->statModel = $statModel;
    }

    /**
     * Get paginated campaign data with stats and sum of revenue
     *
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaign() : LengthAwarePaginator
    {
        return $this->model->select('id', 'utm_campaign')->whereHas('stats')
            ->withSum('stats', 'revenue')
            ->paginate(10);
    }

    /**
     * Get paginated stats data by campaign, date and hour
     * 
     * @param int $campaignId
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaignAndDate($campaignId) : LengthAwarePaginator
    {
        return $this->statModel->selectRaw('date, hour, SUM(revenue) as hourly_revenue')
            ->where('campaign_id', $campaignId)
            ->groupBy('date', 'hour')
            ->paginate(10);
    }

    /**
     * Get paginated stats data by campaign and terms
     *
     * @param int $campaignId
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaignAndTerm($campaignId) : LengthAwarePaginator
    {
        return $this->statModel->selectRaw('term_id, SUM(revenue) as term_revenue')
            ->where('campaign_id', $campaignId)
            ->groupBy('term_id')
            ->with('term')
            ->paginate(10);
    }
}
