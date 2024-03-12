<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use App\Services\CasketService;
use App\Services\HearseService;
use App\Services\ServiceService;
use App\Services\ReligionService;
use App\Services\DeathCauseService;
use App\Services\RelationshipService;
use App\Exceptions\CasketNotFoundException;
use App\Exceptions\HearseNotFoundException;
use App\Http\Requests\CreateServiceRequest;
use App\Exceptions\ServiceNotFoundException;
use App\Http\Requests\SetGallonOfWaterRequest;

class ServiceController extends Controller
{
    private $serviceService;
    private $casketService;
    private $hearseService;
    private $replierService;
    private $jobService;
    private $religionService;
    private $deathCauseService;
    private $relationshipService;


    public function __construct(
        ServiceService $serviceService,
        CasketService $casketService,
        HearseService $hearseService,
        JobService $jobService,
        ReligionService $religionService,
        DeathCauseService $deathCauseService,
        RelationshipService $relationshipService,
    ) {
        $this->serviceService = $serviceService;
        $this->casketService = $casketService;
        $this->hearseService = $hearseService;
        $this->jobService = $jobService;
        $this->religionService = $religionService;
        $this->deathCauseService = $deathCauseService;
        $this->relationshipService = $relationshipService;
    }

    /**
     * Displaying of Inclusions
     */
    public function inclusions($serviceId)
    {
        try {
            $service = $this->serviceService->getServiceById($serviceId);
            return view('service.inclusions', ['service' => $service]);
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Displaying of Hearse
     */
    public function hearse($serviceId)
    {
        return view('service.select-hearse', [
            'hearses' => $this->hearseService->getHearses(),
            'serviceId' => $serviceId
        ]);
    }

    /**
     * Displaying of Caskets
     */
    public function caskets($serviceId)
    {
        return view('service.select-casket', [
            'caskets' => $this->casketService->getCaskets(),
            'serviceId' => $serviceId
        ]);
    }

    /**
     * Displaying of Decased Information
     */
    public function deceased($serviceId)
    {
        return view('service.deceased', [
            'service' => $this->serviceService->getServiceById($serviceId),
            'jobs' => $this->jobService->getJobs(),
            'religions' => $this->religionService->getReligions(),
            'causes'=> $this->deathCauseService->getDeathCauses()
        ]);

    }

    /**
     * Displaying of Informant Information
     */
    public function informant($serviceId)
    {
        return view('service.informant', [
            'service' => $this->serviceService->getServiceById($serviceId),
            'jobs' => $this->jobService->getJobs(),
            'relationships' => $this->relationshipService->getAllRelationships(),
        ]);
    }

    /**
     * Creation of Service
     */
    public function createService(CreateServiceRequest $request)
    {

        $service = $this->serviceService->saveService($request->validated());
        if (!$service) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }
        return redirect()->route('services.inclusions', $service->id)
        ->with(['message', 'Service has been created.']);
    }

    /**
     * Cancelation of Service
     */
    public function cancelServiceCreation($serviceId)
    {
        try {
            $this->serviceService->deleteService($serviceId);
            return redirect()->route('services.type');
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Saving of Inclusions
     */
    public function saveInclusions(SetGallonOfWaterRequest $request, $serviceId)
    {
        try {
            $this->serviceService->setGallonsOfWater($request->validated(), $serviceId);

            if (!$this->serviceService->casketIsSet($serviceId)) {
                return redirect()->route('services.inclusions', $serviceId)->with('warning', 'Please Select a Casket.');
            }

            if (!$this->serviceService->hearseIsSet($serviceId)) {
                return redirect()->route('services.inclusions', $serviceId)->with('warning', 'Please Select a Hearse.');
            }

            return redirect()->route('services.deceased', $serviceId);

        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Selection of Casket
     */
    public function selectCasket($serviceId, $casketId)
    {
        try {
            $this->serviceService->setCasket($serviceId, $casketId);
            return redirect()->route('services.inclusions', $serviceId)
            ->with('message', 'Casket has been selected.');

        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());

        } catch (CasketNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Selection of Hearse
     */
    public function selectHearse($serviceId, $hearseId)
    {
        try {
            $this->serviceService->setHearse($serviceId, $hearseId);
            return redirect()->route('services.inclusions', $serviceId)
                ->with('message', 'Casket has been selected.');

        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());

        } catch (HearseNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
