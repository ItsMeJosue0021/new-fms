<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Services\CasketService;
use App\Http\Requests\StoreCasketRequest;

class CasketController extends Controller
{
    private $casketService;

    public function __construct(CasketService $casketService) {
        $this->casketService = $casketService;
    }

    public function index() {
        return view('casket.index', ['caskets' => $this->casketService->getCaskets()]);
    }

    public function store(StoreCasketRequest $request) {
        try {
            $this->casketService->storeCasket($request->validated());
            return redirect()->back()->with('success', 'Casket has been saved');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to save casket');
        }
    }

}
