<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\UniversityRepo;
use App\Interfaces\Repo\Backend\YourDestinationRepo;
use App\Models\OurProductModel;
use App\Models\UniversityModel;
use App\Models\YourDestinationModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-08-22
 */
class UniversityRepoImpl extends EloquentBaseRepository implements UniversityRepo
{
    protected $model;

    public function __construct(UniversityModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'university_name' => 'required|string',
            'university_details' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getUniversityDetailsBySlug($slug)
    {
        return $this->model::where('slug', $slug)->first();
    }

    public function getUniversityListByDestinationId($id)
    {
        return $this->model::where('destination_id', $id)->get();
    }
    public function getUniversityDetails()
    {
        return $this->model::select('universitys.*','your_destination.destination_name')
            ->leftJoin('your_destination','your_destination.id','universitys.destination_id')
            ->where('universitys.status', '<>',9)->get();
    }
}
