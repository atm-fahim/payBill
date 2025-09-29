<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\ExamRepo;
use App\Models\CategoryModel;

/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-09-18
 */
class ExamRepoImpl extends EloquentBaseRepository implements ExamRepo
{

    protected $model;

    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

}
