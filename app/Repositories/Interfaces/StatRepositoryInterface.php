<?php

namespace App\Repositories\Interfaces;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StatRepositoryInterface
{
    /**
     * Get paginated campaign data with stats and sum of revenue
     *
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaign() : LengthAwarePaginator;

    /**
     * Get paginated stats data by campaign, date and hour
     * 
     * @param int $campaignId
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaignAndDate($campaignId) : LengthAwarePaginator;

    /**
     * Get paginated stats data by campaign and term
     * 
     * @param int $campaignId
     * @return LengthAwarePaginator
     */
    public function getStatsByCampaignAndTerm($campaignId) : LengthAwarePaginator;
}