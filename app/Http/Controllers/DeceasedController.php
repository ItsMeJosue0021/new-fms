<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceService;
use App\Services\DeceasedService;
use App\Exceptions\ServiceNotFoundException;
use App\Exceptions\DeceasedNotFountException;
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

    public function store($serviceId, StoreDeceasedInfoRequest $request)
    {
        try {
            $validated = $request->validated();

            $deceased = $this->deceasedService->saveDeceasedPersonalInfo($serviceId, $validated);
            if (!$deceased) {
                return redirect()->back()->with("error", "Something went wrong. Please try again.");
            }
            $this->serviceService->setDeceased($serviceId, $deceased->id);
            $this->deceasedService->saveDeathDetails($validated, $deceased->id);
            $this->deceasedService->saveDeceasedAddress($validated, $deceased->id);

            return redirect()->route('services.informant', $serviceId)
                ->with("success", "Deceased information has been saved.");

        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with("error", $e->getMessage());
        } catch (DeceasedNotFountException $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
