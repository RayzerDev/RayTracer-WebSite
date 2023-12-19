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

    public function store(Request $request, Scene $scene)
    {
        $noteValue = $request->input('note');

        $note = Note::create(['idUser' => Auth::user()->id, 'idScene' => $scene->id, 'note' => $noteValue]);

        $note->save();

        return back();
    }

    public function update(Request $request, Scene $scene)
    {
        $noteValue = $request->input('note');
        $note = $scene->notes()->where('idUser', Auth::user()->id)->first();
        $note->note = $noteValue;

        $note->save();
        return back();
    }
}
