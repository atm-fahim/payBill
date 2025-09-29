<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    public $timestamps = true;
    public $guarded=[];
}
