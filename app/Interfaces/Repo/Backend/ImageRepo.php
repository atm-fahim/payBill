<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface ImageRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getImageInfoByAlbumId($id);
}
