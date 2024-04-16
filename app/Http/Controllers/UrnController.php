<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUrnRequest;
use App\Models\Urn;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Requests\StoreUrnRequest;

class UrnController extends Controller
{
    private $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }

    public function index() {
        return view('urn.index', [
            'urns' => Urn::paginate(9)
        ]);
    }

    public function create() {
        return view('urn.create');
    }

    public function store(StoreUrnRequest $request) {
        try {
            Urn::create($this->toUrnArray($request->validated()));
            return back()->with('success', 'Urn has been saved.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the urn');
        }
    }

    public function toUrnArray($data) {

        if (isset($data['image'])) {
            $image = $this->fileService->saveImage($data['image'], 'urns');
        } else {
            $image = null;
        }

        return [
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'stock' => $data['stock'] ?? 0,
            'price' => $data['price'],
            'image' => $image,
        ];
    }

    public function edit(Request $request, $id) {
        return view('urn.edit', [
            'urn' => Urn::findOrFail($id)
        ]);
    }

    public function update(UpdateUrnRequest $request, $id) {
        try {
            $urn = Urn::findOrFail($id);
            $urn->update($this->toUrnArray($request->validated()));
            return redirect()->back()->with('success', 'Urn has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the urn');
        }
    }

    public function delete(Request $request, $id) {
        try {
            $urn = Urn::findOrFail($id);
            $urn->delete();
            return redirect()->back()->with('success', 'Urn deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the urn');
        }
    }

    public function deleteUrnImage($id) {
        try {
            $urn = Urn::findOrFail($id);
            $urn->image = null;
            $urn->save();
            return redirect()->back()->with('success', 'Image deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the image');
        }
    }
}
