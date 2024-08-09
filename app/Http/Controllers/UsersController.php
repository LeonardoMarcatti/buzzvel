<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function all() : object|array
    {
        $users =  User::all();

        return \response()->json($users, 200);
    }
}
