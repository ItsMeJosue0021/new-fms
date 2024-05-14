<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\DeceasedDocument;
use App\Http\Requests\StoreDeceasedDocumentsRequest;

class DeceasedDocumentController extends Controller
{
    public function store(StoreDeceasedDocumentsRequest $request, $service_id) {
        try {
            $data = $request->validated();
            $files =  $data['files'];

            $service = Service::findOrFail($service_id);
            $deceased = $service->deceased;

            foreach ($files as $file) {
                $deceased->documents()->create([
                    'deceased_id' => $deceased->id,
                    'name' => $file->getClientOriginalName(),
                    'file' => $file->store('documents', 'public')
                ]);
            }

            return back()->with('success', 'Documents uploaded successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while uploading the documents');
        }
    }

    public function delete($service_id, $document_id) {
        try {
            $document = DeceasedDocument::findOrFail($document_id);
            $document->delete();
            return back()->with('success', 'Document deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, please try again.');
        }
    }

    public function redirectFromDocuments($service_id) {
        try {
            $service = Service::findOrFail($service_id);
            if (isset($service->serviceRequest)) {
                return redirect()->route('services.summary', $service_id);
            }
            return redirect()->route('services.payment-terms', $service_id);
        } catch (\Exception $e) {
            return back()->with('error', 'Service not found. Please try again.');
        }
    }
}
