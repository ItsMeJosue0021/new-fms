<?php

namespace App\Services\Impl;

use App\Models\Announcement;
use App\Models\AnnouncementImage;
use App\Services\FileService;
use App\Services\AnnouncementService;


class  AnnouncementServiceImpl implements AnnouncementService {

    private $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }
    public function getAnnoucements() {
        return Announcement::latest()->paginate(7);
    }

    public function getAnnoucementById($id) {
        return Announcement::find($id);
    }

    public function createAnnouncement(array $data) {
        $announcement = Announcement::create($this->toAnnouncementArray($data));

        if (!empty($data['images'])) {
            $this->storeAnnouncementImages($data['images'], $announcement);
        }
    }

    public function updateAnnouncement(array $data, $id) {
        $announcement = Announcement::findOrFail($id);
        $announcement->update($this->toAnnouncementArray($data));

        if (!empty($data['images'])) {
            $this->storeAnnouncementImages($data['images'], $announcement);
        }
    }

    public function deleteAnnouncementImageById($id) {
        return AnnouncementImage::findOrFail($id)->delete();
    }

    public function deleteAnnouncement($id) {
        return Announcement::findOrFail($id)->delete();
    }

    public function toAnnouncementArray(array $data) {
        return [
            'title' => $data['title'],
            'content' => $data['content']
        ];
    }

    public function storeAnnouncementImages($images, $annoucement) {
        foreach ($images as $image) {
            $annoucement->announcementImages()->create([
                'image' => $this->fileService->saveImage($image, 'announcements'),
                'announcement_id' => $annoucement->id,
            ]);
        }
    }

}
