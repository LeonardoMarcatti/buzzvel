<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index() : object|array
    {
        return User::all();
    }
}
