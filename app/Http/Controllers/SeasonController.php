<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Season;

use Illuminate\Http\Request;

class SeasonController extends Controller
{
    
    public function index(Serie $series)
    {
        $seasons = $series->seasons;

        return view('seasons.index')->with('season', $seasons);
    }
}
