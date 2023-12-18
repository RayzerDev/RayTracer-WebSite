<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function index()
    {
        $scenes = Scene::all();
        return view('scenes.index', compact('scenes'));
    }
}
