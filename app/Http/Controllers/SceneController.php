<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function index(Request $request)
    {
        $equipes = Scene::distinct('equipe')->pluck('equipe')->toArray();

        $selectedTeam = $request->input('equipe');

        $scenes = Scene::when($selectedTeam, function ($query) use ($selectedTeam) {
            return $query->where('equipe', $selectedTeam);
        })->get();

        return view('scenes.index', compact('scenes', 'equipes', 'selectedTeam'));
    }
}
