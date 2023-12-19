<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriController extends Controller
{
    public function toggle($sceneId)
    {
        $user = Auth::user();
        if ($user->favoris()->where('idScene', $sceneId)->exists()) {
            $user->favoris()->detach($sceneId);
        } else {
            $user->favoris()->attach($sceneId);
        }

        return back();
    }

}
