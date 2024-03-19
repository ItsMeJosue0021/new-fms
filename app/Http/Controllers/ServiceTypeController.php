<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index($casketId = null)
    {
        return view('service.service-type', [
            'casketId' => $casketId
        ]);
    }
}
