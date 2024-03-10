<?php

namespace App\Services\Impl;

use App\Models\Job;
use App\Services\JobService;

class JobServiceImpl implements JobService {
    public function getJobs() {
        return Job::all();
    }
}
