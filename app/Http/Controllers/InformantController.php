<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceService;
use App\Services\InformantService;
use App\Exceptions\ServiceNotFoundException;
use App\Http\Requests\StoreInformantRequest;

class InformantController extends Controller
{
    private $informantService;
    private $serviceService;
    public function __construct(InformantService $informantService, ServiceService $serviceService) {
        $this->informantService = $informantService;
        $this->serviceService = $serviceService;
    }

    /**
     * Store informant's information
     */
    public function store(StoreInformantRequest $request, $serviceId) {
        try {
            $validated = $request->validated();

            $informant = $this->informantService->saveInfromantInfo($serviceId, $validated);
            if (!$informant) {
                return redirect()->back()->with("error","Something went wrong. Please try again.");
            }
            $this->serviceService->setInformant($serviceId, $informant->id);
            return redirect()->route("services.other-services", $serviceId)->with("success","Informant information has been saved.");
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with("error",$e->getMessage());
        }
    }
}
