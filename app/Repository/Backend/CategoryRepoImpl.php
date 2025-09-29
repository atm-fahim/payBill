<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\CategoryRepo;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-20
 */
class CategoryRepoImpl extends EloquentBaseRepository implements CategoryRepo
{


    protected $model;

    public function __construct(CategoryModel $model)
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

    public function getCategory()
    {
        return $this->model::with('children')->where('parent_id', 0)->get();
    }

    public function getCategoryInfoById($id)
    {
        return $this->model::where('id', $id)->first();
    }

}
