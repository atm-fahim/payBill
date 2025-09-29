<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\DiscountOfferingRepo;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of Discount for the discount model.
 * they are discount offering info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-08-20
 */
class DiscountOfferingRepoImpl extends EloquentBaseRepository implements DiscountOfferingRepo
{
    protected $model;

    public function __construct(BrandModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'category' => 'required|string',
//            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:200',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }


}
