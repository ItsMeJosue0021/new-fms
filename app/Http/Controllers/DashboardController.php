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

        $confirmedRequests = ServiceRequest::where('status', 'confirmed')->get();

        foreach ($confirmedRequests as $confirmedRequest) {
            $today = date("Y-m-d H:i:s");
            $internment_datetime = $confirmedRequest->service->deceased->deathDetail->internment_date . ' ' . $confirmedRequest->service->deceased->deathDetail->internment_time;
            if (strtotime($internment_datetime) < strtotime($today)) {
                $confirmedRequest->update([
                    'status' => 'completed'
                ]);
            }
        }

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
