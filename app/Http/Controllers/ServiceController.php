<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateServiceRequest;
use App\Exceptions\ServiceNotFoundException;

class ServiceController extends Controller
{
    private $serviceService;

    public function __construct(ServiceService $serviceService) {
        $this->serviceService = $serviceService;
    }

    public function inclusions() {
        return view('service.inclusions');
    }

    public function selectCasket() {
        return view('service.select-casket');
    }

    public function createService(CreateServiceRequest $request) {

        $service = $this->serviceService->saveService($request->validated());
        if (!$service) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        return redirect()->route('services.inclusions', $service->id)
        ->with([
            'message', 'Service has been created.'
        ]);

    }

    public function cancelServiceCreation($serviceId) {
        try {
            $this->serviceService->deleteService($serviceId);
            return redirect()->route('services.type');
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
