<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface UniversityRepo extends EloquentRepositoryInterface{

    public function checkRequestValidity($request);

    public function getUniversityDetailsBySlug($slug);

    public function getUniversityDetails();

    public function getUniversityListByDestinationId($id);
}
