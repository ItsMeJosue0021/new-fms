<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CasketService;
use App\Services\AnnouncementService;

class HomeController extends Controller
{
    private $casketService;
    private $announcementService;

    public function __construct(CasketService $casketService, AnnouncementService $announcementService) {
        $this->casketService = $casketService;
        $this->announcementService = $announcementService;
    }

    public function home() {
        return view('welcome', [
            'caskets' => $this->casketService->getCaskets()
        ]);
    }

    public function about() {
        return view('home.about');
    }

    public function contact() {
        return view('home.contact');
    }

    public function announcements() {
        return view('home.announcements', [
            'announcements' => $this->announcementService->getAnnoucements()
        ]);
    }

    public function showAnnouncement($id) {
        return view('home.show-announcement', [
            'announcement' => $this->announcementService->getAnnoucementById($id)
        ]);
    }

    public function caskets() {
        return view('home.caskets', [
            'caskets' => $this->casketService->getCaskets()
        ]);
    }

    public function selectCasket($casketId) {
        return redirect()->route('services.type', ['casketId' => $casketId]);
    }
}
