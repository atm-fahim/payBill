<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Models\AboutUsModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-11-02
 */
class AboutUsRepoImpl extends EloquentBaseRepository implements AboutUsRepo
{
    protected $model;

    public function __construct(AboutUsModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'about_us_title' => 'required|string',
            'about_us_details' => 'required|string',
            'mission_title' => 'required|string',
            'mission_details' => 'required|string',
//            'vision_title' => 'required|string',
//            'vision_details' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getAboutInfo(){
        return $this->model::select('*')->first();
    }


}
