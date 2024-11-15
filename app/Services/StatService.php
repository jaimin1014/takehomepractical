<?php

namespace App\Services;

use App\Repositories\Interfaces\StatRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StatService
{
    protected $statRepository;

    /**
     * Constructor to inject repository.
     *
     * @param StatRepositoryInterface $statRepository
     */
    public function __construct(StatRepositoryInterface $statRepository)
    {
        $this->statRepository = $statRepository;
    }

    /**
     * Get paginated campaign data with stats and sum of revenue
     *
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaign() : LengthAwarePaginator
    {
        return $this->statRepository->getStatsByCampaign();
    }

    /**
     * Get paginated stats data by campaign, date and hour
     * 
     * @param int $campaignId
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaignAndDate($campaignId) : LengthAwarePaginator
    {
        return $this->statRepository->getStatsByCampaignAndDate($campaignId);
    }

    /**
     * Get paginated stats data by campaign and terms
     *
     * @param int $campaignId
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaignAndTerm($campaignId) : LengthAwarePaginator
    {
        return $this->statRepository->getStatsByCampaignAndTerm($campaignId);
    }
}
