<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\StudentUserRepo;
use App\Models\Frontend\StudentLoginInfo;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-29
 */
class StudentUserRepoImpl extends EloquentBaseRepository implements StudentUserRepo
{
    protected $model;
    public function __construct(StudentLoginInfo $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $id = $request->input('id');
        if(!empty($id)){
            $validStatus = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        }else {
            $validStatus = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
        }
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }
    public function existUserInfo($email){
        return $this->model::where('email', $email)->first();
    }
    public function instructorInfo(){
        $id = auth()->user()->id;
        if(!empty(auth()->user()->user_types) && auth()->user()->user_types=='instructor') {
            return $this->model::select('*')
                ->where('user_types', 'instructor')
                ->where('id', $id)
                ->get();
        }else{
            return $this->model::select('*')
                ->where('user_types', 'instructor')
                ->get();
        }
    }


}
