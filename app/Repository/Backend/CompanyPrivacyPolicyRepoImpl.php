<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\ClientRepo;
use App\Interfaces\Repo\Backend\CompanyInfoRepo;
use App\Interfaces\Repo\Backend\CompanyPrivacyPolicyRepo;
use App\Models\ClientModel;
use App\Models\CompanyInfoModel;
use App\Models\CompanyPrivacyPolicy;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-11-02
 */
class CompanyPrivacyPolicyRepoImpl extends EloquentBaseRepository implements CompanyPrivacyPolicyRepo
{
    protected $model;

    public function __construct(CompanyPrivacyPolicy $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'question' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }


}
