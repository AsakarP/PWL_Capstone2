<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(){
        $users = User::get();

        return view('profile.index', compact('users'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'nullable',
        ])->validate();
    
        $users = User::find($id);
    
        $users->nama       = $request->nama;
        $users->email      = $request->email;
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $users->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $users = $request->user();

        Auth::logout();

        $users->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
