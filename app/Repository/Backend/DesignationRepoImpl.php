<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\DesignationRepo;
use App\Interfaces\Repo\Backend\ExamRepo;
use App\Models\DesignationModel;
use App\Models\EssayQsnModel;
use App\Models\QuizModel;
use App\Models\QbankModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of designation for the designation model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-02-11
 */
class DesignationRepoImpl extends EloquentBaseRepository implements DesignationRepo
{
    protected $model;
    public function __construct(DesignationModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'designation' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }



}
