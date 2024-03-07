<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CasketService;

class CasketController extends Controller
{
    private $casketService;

    public function __construct(CasketService $casketService) {
        $this->casketService = $casketService;
    }

}
