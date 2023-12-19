<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageStoreInStorage
{
    public function saveImageScene($file)
    {
        $nom = uniqid() . "." . $file->extension();
        return $file->storeAs("scene/images",$nom,'public');
    }

    public function saveImageSceneSeeder($fileExtension, $content)
    {

        $uniqueName = uniqid() . "." . $fileExtension;
        $destinationPath = "scene/images/" . $uniqueName;
        Storage::disk('public')->put($destinationPath, $content);

        return $destinationPath;
    }

    public function flushImageScene(): void
    {
        $files = Storage::disk("public")->allFiles("scene/images");

        foreach ($files as $file){
            if ($file != 'scene/images/noimg.png'){
                Storage::delete($file);
            }
        }
    }

    public function flushImageAvatar(): void
    {
        $files = Storage::disk("public")->allFiles("user/avatars");

        foreach ($files as $file){
            if ($file != 'user/avatars/user.png'){
                Storage::delete($file);
            }
        }
    }

    public function saveAvatar($file)
    {
        $nom = uniqid() . "." . $file->extension();
        return $file->storeAs("user/avatars",$nom,'public');
    }


}
