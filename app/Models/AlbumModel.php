<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model
{
    protected $table = 'albums';  // Ensure this matches your DB
    protected $fillable = ['album_name','slug','status'];

    public function images()
    {
        return $this->hasMany(ImageModel::class, 'album_id');
    }
}

