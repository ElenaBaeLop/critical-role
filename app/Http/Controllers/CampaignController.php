<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('category')) {
            ddd($request->input('category'));
        }

        return view('campaigns.index', [
            'campaigns' => Campaign::latest()->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', [
            'campaign' => $campaign
        ]);
    }

}
