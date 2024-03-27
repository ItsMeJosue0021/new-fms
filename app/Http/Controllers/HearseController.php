<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHearseRequest;
use App\Http\Requests\UpdateHearseRequest;
use App\Models\Hearse;
use Illuminate\Http\Request;
use App\Services\HearseService;

class HearseController extends Controller
{

    private $hearseService;

    public function __construct(HearseService $hearseService) {
        $this->hearseService = $hearseService;
    }

    public function index() {
        return view('hearse.index', [
            'hearses' => $this->hearseService->getHearses()
        ]);
    }

    public function create() {
        return view('hearse.create');
    }

    public function store(StoreHearseRequest $request) {
        try {
            $this->hearseService->createHearse(request()->all());
            return redirect()->back()->with('success', 'Hearse has been saved');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to save casket');
        }
    }

    public function edit($hearseId) {
        return view('hearse.edit', [
            'hearse' => $this->hearseService->getHearseById($hearseId)
        ]);
    }

    public function update(UpdateHearseRequest $request, $hearseId) {
        try {
            $this->hearseService->updateHearse($request->validated(), $hearseId);
            return redirect()->back()->with('success', 'Hearse has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to update hearse');
        }
    }

    public function deleteHearseImage($hearseId) {
        try {
            $this->hearseService->deleteHearseImageById($hearseId);
            return redirect()->back()->with('success', 'Hearse image has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to delete hearse image');
        }
    }

    public function delete($hearseId) {
        try {
            $this->hearseService->deleteHearse($hearseId);
            return redirect()->back()->with('success', 'Hearse has been deleted');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to delete hearse');
        }
    }


}
