<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    public $timestamps = true;
    public $guarded=[];
}
