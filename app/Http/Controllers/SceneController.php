<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Parsedown;

class SceneController extends Controller
{
    public function index(Request $request) {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $parseDown = new ParseDown();
        $scene = Scene::find($id);
        $titre = $request->get('action', 'show') == 'show' ? "Détails d'une scene" : "Suppression d'une scene";
        return view('scenes.show', ['titre' => $titre, 'scene' => $scene, 'action' => $request->get('action', 'show'), 'parseDown' => $parseDown]);

        //$sport = Sport::find($id);
        // return view('sports.show', ['tache' => $tache,'titre'=>"Détails d'une tâche", 'action'=>"Editer"]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //
    }

    public function upload(Request $request, $id) {
        //
    }
}
