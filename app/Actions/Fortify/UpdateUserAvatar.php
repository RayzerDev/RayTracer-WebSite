<?php

namespace App\Actions\Fortify;

use App\Traits\ImageStoreInStorage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UpdateUserAvatar
{
    use ImageStoreInStorage;

    /**
     * Validate and update the user's avatar.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        if(!strchr(Auth::user()->avatar,"user.png")){
            unlink(public_path('storage/' . Auth::user()->avatar));
        }

        Auth::user()->update(['avatar' => $this->saveAvatar($request->file('avatar'))]);

        return redirect()->back()->with('success', 'Avatar mis à jour avec succès.');
    }
}
