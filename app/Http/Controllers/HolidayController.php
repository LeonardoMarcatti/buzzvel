<?php

namespace App\Http\Controllers;

use App\Models\HolidayModel;

// use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function all() : object
    {
        return HolidayModel::all();
    }
}
