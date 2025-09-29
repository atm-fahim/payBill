<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\SliderRepo;
use App\Models\SliderModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of slider for the slider model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-01-28
 */
class SliderRepoImpl extends EloquentBaseRepository implements SliderRepo
{


    protected $model;

    public function __construct(SliderModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        if(!empty($request->slider_image1) && empty($request->slider_image)){
            $validStatus = Validator::make($request->all(), [
                'slider_image1' => 'required|string',
            ]);
        }else {
            $validStatus = Validator::make($request->all(), [
                'slider_image' => 'required|image|mimes:jpg,jpeg,png|max:5000',
            ]);
        }
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }


    public function getSliderInfoById($id)
    {
        return $this->model::where('id', $id)->first();
    }

    public function getSliderInfo()
    {
        return $this->model::where('status', 1)->get();
    }

}
