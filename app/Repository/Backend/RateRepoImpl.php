<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\RateRepo;
use App\Models\RateModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of rate for the rate model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-10-20
 */
class RateRepoImpl extends EloquentBaseRepository implements RateRepo
{


    protected $model;

    public function __construct(RateModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'bdt_rate' => 'required|numeric',
            'other_rate' => 'required|numeric',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }



    public function getRateInfoById($id)
    {
        return $this->model::where('id', $id)->first();
    }

}
