<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    /**
     * @throws ValidationException
     */
    public function submitForm(Request $request)
    {
        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $email = $request->input('email');
        $message = $request->input('message');

        $this->validate($request, [
            'nom' => "bail|required|string|min:2",
            'email' => "bail|required|email",
            'message' => "bail|required|string|min:5",
        ]);


        return view('confirmation_contact', compact('prenom','nom', 'email', 'message'));
    }
}
