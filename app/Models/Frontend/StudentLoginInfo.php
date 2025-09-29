<?php

namespace App\Models\Frontend;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class StudentLoginInfo extends Authenticatable
{
    use  Notifiable;

    protected $guard = 'student';

    protected $table = 'student';
    protected $fillable = [
        'student_id',
        'name',
        'email',
        'user_types',
        'branch_id',
        'contact_no',
        'image',
        'status',
        'active_code',
        'password',
        'gauth_id',
        'facebook_id',
        'access_type',
        'full_name',
        ];

    protected $hidden = [
        'password',
    ];



}
