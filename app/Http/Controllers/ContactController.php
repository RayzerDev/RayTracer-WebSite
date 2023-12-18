<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $email = $request->input('email');
        $message = $request->input('message');

        return view('confirmation_contact', compact('prenom','nom', 'email', 'message'));
    }
}
