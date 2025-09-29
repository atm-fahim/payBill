<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Models\OurProductModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-08-22
 */
class OurProductRepoImpl extends EloquentBaseRepository implements OurProductRepo
{
    protected $model;

    public function __construct(OurProductModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'product_details' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getProductDetailsBySlug($slug)
    {
        return $this->model::where('slug', $slug)->first();
    }
}
