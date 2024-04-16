<?php

namespace App\Services\Impl;

use App\Models\ServiceRequest;
use App\Services\ServiceRequestService;

class ServiceRequestServiceImpl implements ServiceRequestService {
    public function createServiceRequest($serviceId) {
        if (ServiceRequest::where('service_id', $serviceId)->where('user_id', auth()->user()->id)->exists()) {
            throw new \Exception('Service request already exists');
        } else {
            return ServiceRequest::create($this->toServiceRequestArray($serviceId));
        }
    }

    public function getAllServiceRequests() {
        return ServiceRequest::where('status', 'pending')->latest()->paginate(9);
    }

    public function getServiceRequestById($id) {
        return ServiceRequest::findOrFail($id);
    }

    public function toServiceRequestArray($serviceId) {

        $user_id = auth()->user()->id;

        return [
            'service_id' => $serviceId,
            'user_id' => $user_id,
            'status' => 'pending'
        ];
    }

    public function getConfirmedServiceRequests() {
        return ServiceRequest::where('status', 'confirmed')->paginate(10);
    }

    public function getServiceRequestsByCustomer($id) {
        return ServiceRequest::where('user_id', $id)->latest()->paginate(10);
    }

    public function cancelServiceRequest($id) {
        $serviceRequest = ServiceRequest::findOrFail($id);

        if ($serviceRequest->status === 'confirmed') {
            throw new \Exception('Cannot cancel a confirmed or completed service request');
        }

        return $serviceRequest->update([
            'status' => 'cancelled'
        ]);

    }

    public function confirmRequest(array $data, $id) {
        $request = ServiceRequest::findOrFail($id);
        return $request->update($this->toPaymentInfoArray($data, $request));
    }

    public function toPaymentInfoArray(array $data, $request) {

        if ($request->service->service_type === 'Memorial Services') {
            $total_amount = $this->calculatePaidAmmountMS($request, $data['discount_amount'], $data['gl']);
        } else {
            $total_amount = $this->calculatePaidAmmountCS($request, $data['discount_amount'], $data['gl']);
        }

        return [
            'status' => 'confirmed',
            'payment_status' => 'Paid',
            'payment_method' => $data['payment_method'],
            'total_amount' => $total_amount,
            'discount_amount' => $data['discount_amount'],
            'recieved_amount' => $data['recieved_amount'],
            'gl' => $data['gl'],
            'payment_reference' => $data['payment_reference'],
            'paid_by' => $data['first_name'] . ' ' . $data['last_name'],
            'payment_date' => today()
        ];
    }

    public function calculatePaidAmmountMS($request, $discount_amount = 0, $gl = 0) {
        $total_amount = $request->service->casket->price;
        $total_discounts = $discount_amount + $gl;
        return $total_amount - $total_discounts;
    }

    public function calculatePaidAmmountCS($request, $discount_amount = 0, $gl = 0) {
        $total_amount = $request->service->urn->price;
        $total_discounts = $discount_amount + $gl;
        return $total_amount - $total_discounts;
    }

    public function getCompletedServiceRequest() {
        return ServiceRequest::latest()->where('status', 'completed')->paginate(10);
    }

    public function markAsCompleted($id) {
        $serviceRequest = ServiceRequest::findOrFail($id);
        return $serviceRequest->update([
            'status' => 'completed'
        ]);
    }
}
