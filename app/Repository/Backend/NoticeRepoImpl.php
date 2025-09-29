<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\NoticeRepo;
use App\Models\NoticeModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of notice for the notice model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-02-12
 */
class NoticeRepoImpl extends EloquentBaseRepository implements NoticeRepo
{
    protected $model;

    public function __construct(NoticeModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'notice_title' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function customiseIsContinueNoticeBoard(){
        return $this->model::where('is_continue',1)->where('status',1)->get()->toArray();
    }
    public function getNoticeDetailsBySlug($slug)
    {
        return $this->model::where('is_continue', 1)
            ->where('status', 1)
            ->where('slug', $slug)
            ->first(); // Using first() to return the first matching result
    }
    public function customiseNoticeBoard(){
        $currentDate = now();
        return $this->model::where('notice_start', '<=', $currentDate)
            ->where('notice_end', '>=', $currentDate)
            ->where('status', 1)
            ->where('is_continue', 0)
            ->get()->toArray();
    }


}
