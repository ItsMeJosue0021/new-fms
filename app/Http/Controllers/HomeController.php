<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CasketService;

class HomeController extends Controller
{
    private $casketService;

    public function __construct(CasketService $casketService) {
        $this->casketService = $casketService;
    }

    public function home() {
        return view('welcome', [
            'caskets' => $this->casketService->getCaskets()
        ]);
    }

    public function about() {
        return view('home.about');
    }

    public function selectCasket($casketId) {
        return redirect()->route('services.type', ['casketId' => $casketId]);
    }
}
