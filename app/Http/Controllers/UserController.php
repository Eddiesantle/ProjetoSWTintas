<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user',$user));
    }
    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('successavatar','You have successfully upload image.');

    }
}
