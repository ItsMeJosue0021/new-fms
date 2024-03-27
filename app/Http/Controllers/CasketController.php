<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCasketRequest;
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

    public function create() {
        return view('casket.create');
    }

    public function store(StoreCasketRequest $request) {
        // dd($request->all());
        try {
            $this->casketService->storeCasket($request->validated());
            return redirect()->back()->with('success', 'Casket has been saved');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to save casket');
        }
    }

    public function edit($casket) {
        return view('casket.edit', [
            'casket' => $this->casketService->getCasketById($casket)
        ]);
    }

    public function update(UpdateCasketRequest $request, $casket) {
        try {
            $this->casketService->updateCasket($request->validated(), $casket);
            return redirect()->back()->with('success', 'Casket has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to update casket');
        }
    }

    public function deleteCasketImage($casket) {
        try {
            $this->casketService->deleteCasketImageById($casket);
            return redirect()->back()->with('success', 'Image has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to delete image');
        }
    }

    public function delete($casket) {
        try {
            $this->casketService->deleteHearse($casket);
            return redirect()->back()->with('success', 'Image has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to delete hearse');
        }
    }

}
