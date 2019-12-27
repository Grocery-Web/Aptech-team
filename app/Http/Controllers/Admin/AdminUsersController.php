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
}
