<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\OtherService;
use Illuminate\Http\Request;
use App\Services\ServiceService;

class OtherServiceController extends Controller
{
    private $serviceService;

    public function __construct(ServiceService $serviceService) {
        $this->serviceService = $serviceService;
    }

    public function create($service_id, $request_id) {
        return view('service.other-services', [
            'service' => $this->serviceService->getServiceById($service_id),
            'page' => 'other-services',
            'request_id' => $request_id,
        ]);
    }

    public function store(Request $request, $service_id) {

        // dd($request->all());

        $data = request()->validate([
            'service' => 'required|string',
            'price' => 'required|numeric',
        ]);

        try {
            $service = Service::findOrFail($service_id);

            $service->otherServices()->create([
                'service_id' => $service->id,
                'service' => $data['service'],
                'price' => $data['price'],
            ]);

            return back()->with('success', 'Other service added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again.');
        }
    }

    public function delete($service_id, $other_service_id) {
        try {
            $otherService = OtherService::findOrFail($other_service_id);
            $otherService->delete();
            return back()->with('success', 'Other service deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, Please try again.');
        }
    }
}
