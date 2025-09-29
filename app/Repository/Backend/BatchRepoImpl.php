<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\BatchRepo;
use App\Models\BatchModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of batch for the batch model.
 * they are batch info
 * @develop by fahim
 * @author kohinurit limited
 * @since 2024-08-04
 */
class BatchRepoImpl extends EloquentBaseRepository implements BatchRepo
{
    protected $model;
    public function __construct(BatchModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'batch_name' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }



}
