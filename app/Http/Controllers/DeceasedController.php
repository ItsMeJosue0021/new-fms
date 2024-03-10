<?php

namespace App\Http\Controllers;

use App\Services\ServiceService;
use Illuminate\Http\Request;
use App\Services\DeceasedService;
use App\Http\Requests\StoreDeceasedInfoRequest;

class DeceasedController extends Controller
{
    private $deceasedService;
    private $serviceService;
    public function __construct(DeceasedService $deceasedService, ServiceService $serviceService)
    {
        $this->deceasedService = $deceasedService;
        $this->serviceService = $serviceService;
    }

    /**
     * Store deceasedinformation, personal info, address, death details
     *
     * @param StoreDeceasedInfoRequest $request
     * @return mixed
     */

    public function store($serviceId, StoreDeceasedInfoRequest $request) {
        // dd($request->all());
        $validated = $request->validated();

        $deceased = $this->deceasedService->saveDeceasedPersonalInfo($validated);
        if (!$deceased) {
            return redirect()->back()->with("error","Something went wrong. Please try again.");
        }
        $this->serviceService->setDeceased($serviceId, $deceased->id);
        $this->deceasedService->saveDeathDetails($validated, $deceased->id);
        $this->deceasedService->saveDeceasedAddress($validated, $deceased->id);

        return redirect()->route('services.informant', $serviceId)
        ->with("success","Deceased information has been saved.");
    }
}
