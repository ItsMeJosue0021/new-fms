<?php

namespace App\Http\Controllers;

use App\Models\Urn;
use App\Models\PaymentTerm;
use Illuminate\Support\Str;
use App\Services\JobService;
use App\Services\CasketService;
use App\Services\HearseService;
use App\Services\ServiceService;
use App\Services\ReligionService;
use App\Models\CondolencesMessage;
use App\Services\DeathCauseService;
use App\Services\RelationshipService;
use App\Exceptions\CasketNotFoundException;
use App\Exceptions\HearseNotFoundException;
use App\Http\Requests\CreateServiceRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Exceptions\ServiceNotFoundException;
use App\Http\Requests\SetOtherServiceRequest;
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
     * Creation of Service
     */
    public function store(CreateServiceRequest $request, $casketId = null)
    {

        $service = $this->serviceService->saveService($request->validated());
        if (!$service) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        if ($casketId) {
            $this->serviceService->setCasket($service->id, $casketId);
        }

        if ($service->service_type == 'Cremation Services') {
            $this->serviceService->setUrn($service->id, Urn::first()->id);
        }

        return redirect()->route('services.inclusions', $service->id)
        ->with(['message', 'Service has been created.']);
    }

    /**
     * Displaying of Inclusions
     */
    public function inclusions($serviceId)
    {
        try {
            $service = $this->serviceService->getServiceById($serviceId);
            return view('service.inclusions', ['service' => $service, 'page' => 'inclusions', 'from' => 'service_type']);
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
            'service' => $this->serviceService->getServiceById($serviceId),
            'page' => 'inclusions'
        ]);
    }

    /**
     * Displaying of Caskets
     */
    public function caskets($serviceId)
    {
        return view('service.select-casket', [
            'caskets' => $this->casketService->getCaskets(),
            'service' => $this->serviceService->getServiceById($serviceId),
            'page' => 'inclusions'
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
            'causes'=> $this->deathCauseService->getDeathCauses(),
            'page' => 'deceased'
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
            'page' => 'informant'
        ]);
    }

    /**
     * Displaying of Other services
     */
    public function otherServices($serviceId)
    {
        return view('service.others', [
            'service' => $this->serviceService->getServiceById($serviceId),
            'page' => 'other'
        ]);
    }

    public function paymentTerms($serviceId)
    {
        return view('service.payment-terms', [
            'service' => $this->serviceService->getServiceById($serviceId),
            'term' => PaymentTerm::first(),
            'page' => 'payment_terms'
        ]);
    }

    public function summary($serviceId)
    {
        return view('service.summary', [
            'service' => $this->serviceService->getServiceById($serviceId),
            'page' => 'summary'
        ]);
    }

    public function message($serviceId) {
        $service = $this->serviceService->getServiceById($serviceId);
        $url = route('qrview', [$service->serviceRequest->id, Str::random(10)]);
        $qrCode = QrCode::format('png')->size(250)->generate($url);
        return view('service.message', [
            'service' => $this->serviceService->getServiceById($serviceId),
            'message' => CondolencesMessage::first(),
            'qrcode' => $qrCode
        ]);
    }

    /**
     * Cancelation of Service
     */
    public function cancelServiceCreation($serviceId)
    {
        try {
            $this->serviceService->cancelService($serviceId);
            return redirect()->route('services.type');
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function deleteService($serviceId) {
        try {
            $this->serviceService->deleteService($serviceId);
            return redirect()->back()->with('success', 'Service request has been deleted.');
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to deleted Service request.');
        }
    }

    /**
     * Saving of Inclusions
     */
    public function saveInclusions($serviceId)
    {
        try {
            $service = $this->serviceService->getServiceById($serviceId);
            if ($service == 'Memorial Services') {
                if (!$this->serviceService->casketIsSet($serviceId)) {
                    return redirect()->route('services.inclusions', $serviceId)->with('warning', 'Please Select a Casket.');
                }
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

    public function addOtherServices(SetOtherServiceRequest $request, $serviceId)
    {
        try {
            $service = $this->serviceService->getServiceById($serviceId);
            $otherServices = $request->validated();
            if ($otherServices['others'] === null) {
                if (isset($service->serviceRequest)) {
                    return redirect()->route('services.summary', $serviceId);
                }
                return redirect()->route('services.payment-terms', $serviceId);
            }
            $this->serviceService->setOtherServices($serviceId, $otherServices);
            if (isset($service->serviceRequest)) {
                return redirect()->route('services.summary', $serviceId);
            }

            return redirect()->route('services.payment-terms', $serviceId);
        } catch (ServiceNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
