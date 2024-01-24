<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait Upload{

    public function uploadOneImage($file, $folderName)
    {
        $this->checkDirectory(storage_path('app/public/'.$folderName));

        $rand = Str::random(10);
        $fileName = $rand.$file->getClientOriginalName();
        $img = Image::make($file)->encode();
        Storage::drive('public')->put($folderName.'/'.$fileName , $img);
        return $fileName;
    }




    public function uploadVideoCourse($file, $folderName)
    {
        //   $fileName = md5(auth()->user()->id) .'-'.Str::random(5);
        Storage::put($folderName, $file);
        return $file->hashName();
    }



    protected function checkDirectory($imageDirectory)
    {
        if(!file_exists($imageDirectory))
        {
            mkdir($imageDirectory, 0755, true);
        }
    }


    public function removeFile($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
