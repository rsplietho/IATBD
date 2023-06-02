<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Auth;

use App\Models\User;


class UserController extends Controller
{
    public function blockUser(Request $request) {
        $user = Auth::user();
        if(!$user->isAdmin()) {
            abort(403);
        }
        $request->validate([
            'userid' => 'required|exists:users,id',
        ]);

        $user = User::find($request->userid);
        $current_status = $user->status;
        $user->status = !$current_status;
        $user->save();
        
        if($current_status){
            return redirect('/admin')->with('success', 'Gebruiker geblokkeerd');
        } else {
            return redirect('/admin')->with('success', 'Gebruiker gedeblokkeerd');
        }
    }

    public function editUser(Request $request) {
        $currentUser = Auth::user();
        if($currentUser->id != $request->userID && !$currentUser->isAdmin()) {
            abort(403, 'Niet geauthoriseerd');
        }

        $request->validate([
            'name' => ['string', 'max:255'],
            'username' => ['string', 'max:32', Rule::unique('users')->ignore($request->userID)],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($request->userID)],
            'password' => ['nullable','confirmed', Rules\Password::defaults()],
        ]);

        if($request->name == null) {
            $request->name = User::where('id', $request->userID)->first()->name;
        }
        if($request->username == null) {
            $request->username = User::where('id', $request->userID)->first()->username;
        }
        if($request->email == null) {
            $request->email = User::where('id', $request->userID)->first()->email;
        }
        if($request->password == null) {
            $request->password = User::where('id', $request->userID)->first()->password;
        }
        if($request->password != null) {
            $request->password = Hash::make($request->wachtwoord);
        }

        $user = User::find($request->userID);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('/profile')->with('success', 'Profiel aangepast!');
    }
}
