<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of customer  for the customer model.
 * they are customer membership info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-10-11
 */
class CustomerRepoImpl extends EloquentBaseRepository implements CustomerRepo
{


    protected $model;

    public function __construct(CustomerModel $model)
    {
        $this->model = $model;
    }
    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'customer_name' => 'required|string',
            'address' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function customerInfoByOrgId($orgId)
    {
        if(auth()->user()->user_types=='super-admin'):
            return $this->model::where('org_id', $orgId)->where('status', '<>', 9)->get();
        else:
            return $this->model::where('org_id', $orgId)->where('branch_id', auth()->user()->branch_id)->where('status', '<>', 9)->get();
        endif;

    }
}
