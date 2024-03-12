<?php

namespace App\Services\Impl;

use App\Models\InformantRelationship;
use App\Services\RelationshipService;

class RelationshipServiceImpl implements RelationshipService {
    public function getAllRelationships() {
        return InformantRelationship::all();
    }
}
