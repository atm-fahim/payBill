<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\AlbumRepo;
use App\Interfaces\Repo\Backend\LogoRepo;
use App\Interfaces\Repo\Backend\SliderRepo;
use App\Models\AlbumModel;
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
class AlbumRepoImpl extends EloquentBaseRepository implements AlbumRepo
{


    protected $model;

    public function __construct(AlbumModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'album_name' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }


    public function getAlbumInfoById($id)
    {
        return $this->model::where('id', $id)->first();
    }


}
