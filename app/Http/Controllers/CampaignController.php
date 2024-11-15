<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Services\StatService;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    protected $statService;

    /**
     * Constructor to inject service.
     *
     * @param StatService $statService
     */
    public function __construct(StatService $statService)
    {
        $this->statService = $statService;
    }

    /**
     * Display list of campaigns and aggregate revenue for each campaign
     * 
     * @return View
     */
    public function index()
    {
        $stats = $this->statService->getStatsByCampaign();
        return view('stats.index', compact('stats'));
    }

    /**
     * Display a specific campaign with a hourly breakdown of all revenue
     * 
     * @param Campaign $campaign
     * @return View
     */
    public function show(Campaign $campaign)
    {
        $stats = $this->statService->getStatsByCampaignAndDate($campaign->id);
        return view('stats.show_by_date', compact('stats'));
    }

    /**
     * Display a specific campaign with the aggregate revenue by utm_term
     * 
     * @param Campaign $campaign
     * @return View
     */
    public function publishers(Campaign $campaign)
    {
        $stats = $this->statService->getStatsByCampaignAndTerm($campaign->id);
        return view('stats.show_by_term', compact('stats'));
    }
}
