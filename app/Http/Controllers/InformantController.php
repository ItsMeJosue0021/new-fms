<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInformantRequest;
use Illuminate\Http\Request;

class InformantController extends Controller
{
    public function store(Request $request) {
        dd($request->all());
    }
}
