<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\LogoRepo;
use App\Interfaces\Repo\Backend\SliderRepo;
use App\Models\LogoModel;
use App\Models\SliderModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of slider for the slider model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-01-28
 */
class LogoRepoImpl extends EloquentBaseRepository implements LogoRepo
{


    protected $model;

    public function __construct(LogoModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        if (!empty($request->logo_image1) && empty($request->logo_image)) {
            $validStatus = Validator::make($request->all(), [
                'logo_image1' => 'required|string',
            ]);
        } else {
            $validStatus = Validator::make($request->all(), [
                'logo_image' => 'required|image|mimes:jpg,jpeg,png|max:5000',
            ]);
        }

        if (!empty($request->favicon1) && empty($request->favicon)) {
            $validStatus = Validator::make($request->all(), [
                'favicon1' => 'required|string',
            ]);
        } else {
            $validStatus = Validator::make($request->all(), [

                'favicon' => 'required|image|mimes:jpg,jpeg,png,ico|max:5000',
            ]);
        }



        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }


    public function getLogoInfoById($id)
    {
        return $this->model::where('id', $id)->first();
    }
    public function getLogoInfo()
    {
        return $this->model::where('status', 1)->first();
    }

}
