<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function index(){
        return view("auth.passwords.displayPasswordUpdate");
    }

    public function passwordUpdate(Request $request){
        $request->validate([
            'oldPassword'   => 'required',
            'password'      => 'required|confirmed',
        ]);

        $currentPass = Auth::user()->password;
        if(Hash::check($request->oldPassword, $currentPass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route("login")->withSuccess('New password has aldready updated');;
        }else{
            return redirect()->back()->withFail('New password has not been updated');
        }
    }

}
