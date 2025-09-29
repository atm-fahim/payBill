<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\CategoryRepo;
use App\Models\CategoryModel;

/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-28
 */
class CategoryRepoImpl extends EloquentBaseRepository implements CategoryRepo
{

    protected $model;

    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    public function getCategory()
    {
        return $this->model::with('children')->where('parent_id', 0)->get();
    }



}
