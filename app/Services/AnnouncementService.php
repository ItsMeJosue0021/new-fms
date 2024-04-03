<?php

namespace App\Services;

interface AnnouncementService {
    public function getAnnoucements();
    public function getAnnoucementById($id);
    public function createAnnouncement(array $data);
    public function updateAnnouncement(array $data, $id);
    public function deleteAnnouncementImageById($id);
    public function deleteAnnouncement($id);
}
