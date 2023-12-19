<?php

namespace App\Http\Controllers;

use App\Models\Scene;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(Request $request, Scene $scene)
    {
        $request->validate([
            'corp' => 'required',
        ]);

        $commentaire = new Commentaire();
        $commentaire->idUser = Auth::id();
        $commentaire->idScene = $scene->id;
        $commentaire->titre = $request->titre;
        $commentaire->corp = $request->corp;
        $commentaire->save();

        return back();
    }

    public function edit(Commentaire $commentaire)
    {
        if (Auth::id() != $commentaire->user_id) {
            return redirect()->back()->with('error', 'Vous n\'avez pas le droit de modifier ce commentaire.');
        }

        return view('comment.edit', compact('commentaire'));
    }

    public function update(Request $request, Commentaire $commentaire): RedirectResponse
    {
        $request->validate([
            'corp' => 'required',
        ]);

        if (Auth::id() != $commentaire->idUser) {
            return redirect()->back()->with('error', 'Vous n\'avez pas le droit de modifier ce commentaire.');
        }

        $commentaire->corp = $request->corp;
        $commentaire->save();

        return redirect()->back()->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy(Commentaire $commentaire)
    {
        if (Auth::id() != $commentaire->idUser) {
            return redirect()->back()->with('error', 'Vous n\'avez pas le droit de supprimer ce commentaire.');
        }

        $commentaire->delete();

        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }
}
