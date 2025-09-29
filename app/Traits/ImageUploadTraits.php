<?php

namespace App\Traits;

use Image;

/**
 * Traits implementation of menu for the backend model.
 * they are image resize
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-20-08-20
 */
trait ImageUploadTraits
{
    /**
     * @param $imgPutPath
     * @param $image
     * @param $imgReadPath
     * @image size 150 x 150 thumbnail image
     * @return string image path and name
     */

    public function thumbnailImage($imgPutPath, $image, $imgReadPath)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        //------------------------------
        if (!file_exists($imgPutPath)) {
            mkdir($imgPutPath, 0777, true);
        }
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($imgPutPath . '/' . $imageName);
        $image->move($imgPutPath, $imageName);
        return $imgReadPath . '/' . $imageName;
    }

    /**
     * @param $imgPutPath
     * @param $image
     * @param $imgReadPath
     * @image size 900 x 550
     * @return string image path and name
     */
    public function slideImage($imgPutPath, $image, $imgReadPath)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        //------------------------------
        if (!file_exists($imgPutPath)) {
            mkdir($imgPutPath, 0777, true);
        }
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(900, 550, function ($constraint) {
            $constraint->aspectRatio();
        })->save($imgPutPath . '/' . $imageName);
        $image->move($imgPutPath, $imageName);
        return $imgReadPath . '/' . $imageName;
    }

    /**
     * @param $imgPutPath
     * @param $image
     * @param $imgReadPath
     * @image size 500 x 500 Font page image
     * @return string image path and name
     */

    public function displayImage($imgPutPath, $image, $imgReadPath)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        //------------------------------
        if (!file_exists($imgPutPath)) {
            mkdir($imgPutPath, 0777, true);
        }
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($imgPutPath . '/' . $imageName);
        $image->move($imgPutPath, $imageName);
        return $imgReadPath . '/' . $imageName;
    }
}
