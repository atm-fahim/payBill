<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\ClientRepo;
use App\Interfaces\Repo\Backend\ContactUsRepo;
use App\Models\ClientModel;
use App\Models\ContactUsModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-11-13
 */
class ContactUsRepoImpl extends EloquentBaseRepository implements ContactUsRepo
{
    protected $model;

    public function __construct(ContactUsModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'contact_number' => 'required|string',
            'address' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }
    public function contactInformation(){
      return $this->model::select('contact_us.*','branch.branch_name')
                ->leftjoin('branch','contact_us.branch_id','=','branch.id')
                ->get();

    }

}
