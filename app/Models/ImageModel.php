<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $fillable = ['album_id', 'image_path'];

    public function album()
    {
        return $this->belongsTo(AlbumModel::class, 'album_id');
    }
}
