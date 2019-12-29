<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminUsersController extends Controller
{
    //Display all user account
    public function index()
    {
        $users = User::all();
        return view("user.displayAccounts", ['users' => $users]);
    }

    //Display avatar update form
    public function avatarUpdateForm()
    {
        return view("auth.avatarUpdate");
    }

    // Update avatar
    public function updateAvatar(Request $request,$id)
    {
        $user = User::find($id);
        $request->validate([
            'avatar'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile("avatar")) {
            $avatarname =  $user->avatar;
            if($avatarname == 'default.jpg'){
                $ext =  $request->file("avatar")->getClientOriginalExtension();
                $imageName = $user->username . "." . $ext; 
                $request->avatar->storeAs("public/user_images/", $imageName);
                $arrayToUpdate = array('avatar' => $imageName);
                DB::table('users')->where('id', $id)->update($arrayToUpdate);
                return redirect()->route("adminAvatarUpdateForm")->withSuccess('Avatar has already updated');
            }else{
                $exists = Storage::disk('local')->exists("public/product_images/" . $avatarname);
                //delete old avatar
                if ($exists) {
                    Storage::delete('public/product_images/' . $avatarname);
                }
                //upload new avatar
                $request->avatar->storeAs("public/user_images/", $avatarname);
                // update table users
                $arrayToUpdate = array('avatar' => $avatarname);
                DB::table('users')->where('id', $id)->update($arrayToUpdate);
                return redirect()->route("adminAvatarUpdateForm")->withSuccess('Avatar has already updated');
            }
        }else{
            return redirect()->route("adminAvatarUpdateForm")->withFail('Avatar has not updated yet');
        }
    }

    // Display Update User Account Form
    public function editAccount($id)
    {
        $user = User::find($id);
        return view("user.editAccounts", ['user' => $user]);
    }

    // Update User Account
    public function updateUserChange(Request $request, $id)
    {
        $request->validate([
            'email'    => 'email',
        ]);

        $username   =  preg_replace('/\s+/', ' ' , $request->input('username'));
        $name       =  $request->input('name');
        $email      =  $request->input('email');
        $role       =  $request->input('role');
        $gender     =  $request->input('gender');
        $phone      =  $request->input('phone');
        $address    =  $request->input('address');

        // Check unique username
        $result = DB::table('users')->where([
            ['username', '=', $username],
            ['id', '<>', $id],
        ])->get();
        if (count($result)) {
            return redirect()->route("adminEditUserForm",$id)->withFail('Username has already taken');
        }

        // Check unique email
        $result = DB::table('users')->where([
            ['email', '=', $email],
            ['id', '<>', $id],
        ])->get();
        if (count($result)) {
            return redirect()->route("adminEditUserForm",$id)->withFail('Email has already takend');
        }

        // Check numeric phone
        if(ctype_digit($phone)==false){
            return redirect()->route("adminEditUserForm",$id)->withFail('Phone must is a range of number');
        }

        $userUpdated = array(
            "name" => $name, "username" => $username, "role_id" => $role, "sex" => $gender, "phone" => $phone,
            "address" => $address
        );

        $created  = DB::table("users")->where('id', $id)->update($userUpdated);

        if ($created) {
            return redirect()->route("adminEditUserForm",$id)->withSuccess('User has already updated');
        } else {
            return redirect()->route("adminEditUserForm",$id)->withFail('User has not updated yet');
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        // Delete avatar in Storage
        if($user['avatar'] != 'default.jpg'){
            $exists = Storage::disk("local")->exists("public/user_images/".$user['avatar']);
            if ($exists) {
                Storage::delete('public/user_images/'.$user['avatar']);
            }
        }

        if(Auth::user()->id == $user['id']){
            User::destroy($id);
            Auth::logout();
            return redirect()->route("login");
        }else{
            User::destroy($id);
            return redirect()->route("adminDisplayAccount");
        }
        
    }
    // Display Adding User Form
    public function addAccountForm()
    {
        return view("user.addAccount");
    }
    // Add New User
    public function addNewAccount(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|unique:users',
            'phone'    => 'string|unique:users',
            'avatar'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $email                 =  $request->input('email');
        $password              =  Hash::make($request->input('password'));
        $username              =  $request->input('username');
        $name                  =  $request->input('name');
        $phone                 =  $request->input('phone');
        $address               =  $request->input('address');
        $avatar                =  $request->input('avatar');
        $role_id               =  $request->input('role_id');
        $gender                =  $request->input('gender');

        $ext = $request->file('avatar')->getClientOriginalExtension();
        $username =  str_replace(" ", "", $username);
        $avatarname   =  $username . "." . $ext;
        $request->avatar->storeAs("public/user_images/", $avatarname);

        $arrayToInsert = array(
            "email" => $email, "password" => $password, "username" => $username, "name" => $name,
            "phone" => $phone, "address" => $address, "avatar" => $avatarname, "role_id" => $role_id,
            "sex" => $gender
        );

        $created  = DB::table("users")->insert($arrayToInsert);
        if ($created) {
            return redirect()->route("adminDisplayAccount");
        } else {
            return redirect()->route("adminAddAccountForm")->withFail('User has not been added yet');
        }
    }

}
