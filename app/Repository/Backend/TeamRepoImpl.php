<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\ClientRepo;
use App\Interfaces\Repo\Backend\TeamRepo;
use App\Models\ClientModel;
use App\Models\TeamModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-11-15
 */
class TeamRepoImpl extends EloquentBaseRepository implements TeamRepo
{
    protected $model;

    public function __construct(TeamModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'member_name' => 'required|string',
            'profile'     => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }


}
