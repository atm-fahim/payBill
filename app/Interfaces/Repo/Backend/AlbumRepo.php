<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface AlbumRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getAlbumInfoById($id);
}
