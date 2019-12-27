<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;

class AdminUsersController extends Controller
{
    //display all user account
    public function index()
    {
        $users = User::all();
        return view("user.displayAccounts", ['users' => $users]);
    }

    public function editAccount($id)
    {
        $user = User::find($id);
        return view("user.editAccounts", ['user' => $user]);
    }

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
            $exists = Storage::disk("local")->exists("public/product_images/".$user['avatar']);
            if ($exists) {
                Storage::delete('public/product_images/'.$user['avatar']);
            }
        }
        User::destroy($id);
        return redirect()->route("adminDisplayAccount");
    }

}
