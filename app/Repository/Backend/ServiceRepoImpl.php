<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Models\ServiceModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-11-02
 */
class ServiceRepoImpl extends EloquentBaseRepository implements ServiceRepo
{
    protected $model;

    public function __construct(ServiceModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'service_title' => 'required|string',
            'service_details' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getServiceDetailsBySlug($slug)
    {
        return $this->model::where('slug', $slug)->first();
    }
}
