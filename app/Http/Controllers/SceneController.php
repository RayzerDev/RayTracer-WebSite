<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class SceneController extends Controller
{
    public function index(Request $request)
    {

        Log::info('Hello from index');
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);
        if (!isset($cat)) {
            if (!isset($value)) {
                $scenes = Scene::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $scenes = Scene::where('equipe', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $scenes = Scene::all();
                Cookie::expire('cat');
            } else {
                $scenes = Scene::where('equipe', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $equipes = Scene::distinct('equipe')->pluck('equipe');
        return view('scenes.index',
            ['titre' => "Liste des scenes", 'scenes' => $scenes, 'cat' => $cat, 'equipes' => $equipes]);
    }

}
