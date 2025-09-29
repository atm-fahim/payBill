<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\AlbumRepo;
use App\Interfaces\Repo\Backend\ImageRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    private $albmRepo;
    private $imgRepo;


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct(
        AlbumRepo $albmRepo,
        ImageRepo $imgRepo,
    )
    {
        $this->albmRepo   = $albmRepo;
        $this->imgRepo   = $imgRepo;
    }

    public function index()
    {
        $albumInfo         = $this->albmRepo->withoutDeletingData();
        return view('frontend.album')
            ->with('album_info', $albumInfo);
    }

    public function getImageInfoById($id)
    {
        $album = $this->albmRepo->getAlbumInfoById($id);
        // Get the image by ID and include the related album
        $image = $this->imgRepo->getImageInfoByAlbumId($id);
        if (!$image) {
            return redirect()->route('frontend.album')->with('error', 'Image not found.');
        }

        return view('frontend.album_image', compact('image','album'));
    }


}
