<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetGallonOfWaterRequest;
use App\Services\CasketService;
use App\Services\HearseService;
use App\Services\ServiceService;
use App\Http\Requests\CreateServiceRequest;
use App\Exceptions\ServiceNotFoundException;

class ServiceController extends Controller
{
    private $serviceService;
    private $casketService;
    private $hearseService;

    public function __construct(ServiceService $serviceService, CasketService $casketService, HearseService $hearseService) {
        $this->serviceService = $serviceService;
        $this->casketService = $casketService;
        $this->hearseService = $hearseService;
    }

    public function inclusions($serviceId) {
        try {
            $service = $this->serviceService->getServiceById($serviceId);
            return view('service.inclusions', ['service' => $service]);
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function hearse($serviceId) {
        $hearses = $this->hearseService->getHearses();
        return view('service.select-hearse', ['hearses' => $hearses, 'serviceId' => $serviceId]);
    }

    public function caskets($serviceId) {
        $caskets = $this->casketService->getCaskets();
        return view('service.select-casket', ['caskets' => $caskets, 'serviceId' => $serviceId]);
    }

    public function createService(CreateServiceRequest $request) {

        $service = $this->serviceService->saveService($request->validated());
        if (!$service) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        return redirect()->route('services.inclusions', $service->id)
        ->with(['message', 'Service has been created.']);

    }

    public function cancelServiceCreation($serviceId) {

        try {
            $this->serviceService->deleteService($serviceId);
            return redirect()->route('services.type');
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function saveInclusions(SetGallonOfWaterRequest $request, $serviceId) {

        try {

            $this->serviceService->setGallonsOfWater($request->validated(), $serviceId);

            if (!$this->serviceService->casketIsSet($serviceId)) {
                return redirect()->route('services.inclusions', $serviceId)->with('warning', 'Please Select a Casket.');
            }

            if (!$this->serviceService->hearseIsSet($serviceId)) {
                return redirect()->route('services.inclusions', $serviceId)->with('warning', 'Please Select a Hearse.');
            }

            return redirect()->route('services.inclusions', $serviceId)
            ->with('message', 'Gallons of water has been set.');

        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}
