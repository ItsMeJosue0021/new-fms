<?php

namespace App\Http\Controllers;

use App\Models\Casket;
use Illuminate\Http\Request;

class JsonResponseController extends Controller
{
    public function caskets() {
        $caskets = Casket::latest()->filter(Request(['search']))->get();
        return view('json.caskets', compact('caskets'));
        // return response()->json($caskets);
    }
}
