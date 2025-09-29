<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\YourDestinationRepo;
use App\Models\OurProductModel;
use App\Models\YourDestinationModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-08-22
 */
class YourDestinationRepoImpl extends EloquentBaseRepository implements YourDestinationRepo
{
    protected $model;

    public function __construct(YourDestinationModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'destination_name' => 'required|string',
            'destination_details' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getDestinationDetailsBySlug($slug)
    {
        return $this->model::where('slug', $slug)->first();
    }
}
