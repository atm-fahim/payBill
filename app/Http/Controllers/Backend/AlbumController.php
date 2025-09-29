<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AlbumRepo;
use App\Models\AlbumModel;
use App\Models\ImageModel;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AlbumController extends BaseController
{
    use UserAccessTraits;
    private $abmRepo;
    public function __construct(AlbumRepo $abmRepo)
    {
        $this->middleware('auth');
        $this->abmRepo = $abmRepo;
    }
    // Show album create form
    public function create()
    {
        $userAccessData = $this->userAccessFunction();
        $albumData     = $this->abmRepo->withoutDeletingData();
        return view('backend.album.create')
            ->with('album_info', $albumData)
            ->with('user_access',$userAccessData);
    }

// Store new album and redirect to upload page
    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->abmRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['album_name']         = $request->input('album_name');
            $data['slug']               = Str::slug($data['album_name']);
            $data['status']             = 1;
            (!empty($id))?$this->abmRepo->update($id,$data):$this->abmRepo->save($data);
            return Redirect::to('create-album');
//            return Redirect::to('album.show', $album->id);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function imageUpload()
    {
        $userAccessData = $this->userAccessFunction();
        $albumData     = $this->abmRepo->withoutDeletingData();
        return view('backend.album.create')
            ->with('album_info', $albumData)
            ->with('user_access',$userAccessData);
    }

    public function show($id)
    {
        $album = AlbumModel::with('images')->findOrFail($id);
//        $album = AlbumModel::with('images')->first();
        return view('backend.album.show', compact('album'));
    }

    public function uploadImages(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $albumFolder = public_path("upload/album/$id");
        if (!file_exists($albumFolder)) {
            mkdir($albumFolder, 0777, true);
        }

        foreach ($request->file('images') as $file) {
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($albumFolder, $filename);

            ImageModel::create([
                'album_id' => $id,
                'image_path' => "upload/album/$id/" . $filename,
            ]);
        }

        return response()->json(['status' => 'success']);
    }

    public function edit($id)
    {
        $brandData=$this->abmRepo->findById($id);
        echo json_encode($brandData);
    }

    public function active($id)
    {
        $this->abmRepo->update($id,['status'=>1]);
        return redirect('add-nitice-event');
    }

    public function inActive($id)
    {
        $this->abmRepo->update($id,['status'=>0]);
        return redirect('add-nitice-event');
    }

    public function delete($id)
    {
        $this->abmRepo->update($id,['status'=>9]);
        return redirect('add-nitice-event');
    }

}
