<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function all() : object|array
    {
        return User::all();
    }
}
