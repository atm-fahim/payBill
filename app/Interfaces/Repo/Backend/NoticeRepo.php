<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface NoticeRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function customiseIsContinueNoticeBoard();
    public function customiseNoticeBoard();
    public function getNoticeDetailsBySlug($slug);
}
