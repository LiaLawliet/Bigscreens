<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts;

class BackController extends Controller
{
    public function index(){
        $pieChart_question6 = Charts::pieCharts(6);
        $pieChart_question7 = Charts::pieCharts(7);
        $pieChart_question8 = Charts::pieCharts(8);

        $radarChart = Charts::radarCharts([11,12,13,14,15]);
        return view('back.index', [
            'pieQ6'=>$pieChart_question6,
            'pieQ7'=>$pieChart_question7,
            'pieQ8'=>$pieChart_question8,
            'radar_data'=>$radarChart
            ]);
    }
}
