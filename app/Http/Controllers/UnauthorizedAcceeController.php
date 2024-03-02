<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnauthorizedAcceeController extends Controller
{
    public function unauthorizedAccess()
    {
        return view('unauthorized-access');
    }
}
