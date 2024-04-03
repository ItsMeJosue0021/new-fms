<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use Illuminate\Http\Request;
use App\Services\AnnouncementService;

class AnnouncementController extends Controller
{

    private $announcementService;

    public function __construct(AnnouncementService $announcementService) {
        $this->announcementService = $announcementService;
    }

    public function index() {
        return view('announcements.index', [
            'announcements' => $this->announcementService->getAnnoucements()
        ]);
    }

    public function create() {
        return view('announcements.create');
    }

    public function store(StoreAnnouncementRequest $request) {
        try {
            $this->announcementService->createAnnouncement($request->validated());
            return redirect()->back()->with('success', 'Announcement has been posted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to post Announcement');
        }
    }

    public function show($id) {
        return view('announcements.show', [
            'announcement' => $this->announcementService->getAnnoucementById($id)
        ]);
    }

    public function edit($id) {
        return view('announcements.edit', [
            'announcement' => $this->announcementService->getAnnoucementById($id)
        ]);
    }

    public function update(StoreAnnouncementRequest $request, $id) {
        try {
            $this->announcementService->updateAnnouncement($request->validated(), $id);
            return redirect()->back()->with('success', 'Announcement has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to update Announcement');
        }
    }

    public function delete($id) {
        try {
            $this->announcementService->deleteAnnouncement($id);
            return redirect()->back()->with('success', 'Announcement has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to delete Announcement');
        }
    }

    public function deleteAnnouncementImage($id) {
        try {
            $this->announcementService->deleteAnnouncementImageById($id);
            return redirect()->back()->with('success', 'Image has been deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong while trying to delete the Image');
        }
    }

}

