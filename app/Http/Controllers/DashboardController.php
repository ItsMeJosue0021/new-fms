<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Casket;
use App\Models\Hearse;
use App\Charts\SalesChart;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;

class DashboardController extends Controller
{
    public function admin(SalesChart $chart) {

        return view('admin-dashboard', [
            'users' => User::all()->count(),
            'caskets' => Casket::all()->count(),
            'hearses' => Hearse::all()->count(),
            'requests' => ServiceRequest::all()->count(),
            'completed_requests' => ServiceRequest::where('status', 'completed')->count(),
            'chart' => $chart->build()
        ]);
    }
}
