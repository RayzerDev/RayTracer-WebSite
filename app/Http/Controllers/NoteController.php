<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Scene;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $sceneId = $request->input('idScene');
        $note = $request->input('note');
        $currentNote = $user->notes()->where('idScene', $sceneId)->first();

        $this->validate(
            $request,
            [
                'note' => 'required',
            ]
        );

        if ($user->notes()->where('idScene', $sceneId)->exists()) {
            $currentNote->note = $note;
        } else {
            $currentNote = Note::create(['idUser' => $user->id, 'idScene' => $sceneId, 'note' => $note]);
        }
        $currentNote->save();
        return back();
    }


}
