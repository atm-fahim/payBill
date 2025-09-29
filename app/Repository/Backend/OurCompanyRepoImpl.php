<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\BatchRepo;
use App\Interfaces\Repo\Backend\OurCompanyRepo;
use App\Models\BatchModel;
use App\Models\OurCompanyModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of batch for the batch model.
 * they are batch info
 * @develop by fahim
 * @author kohinurit limited
 * @since 2025-09-08
 */
class OurCompanyRepoImpl extends EloquentBaseRepository implements OurCompanyRepo
{
    protected $model;
    public function __construct(OurCompanyModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'company_name' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getCompanyInfo($slug)
    {
        return $this->model::where('slug', $slug)->first();
    }

}
