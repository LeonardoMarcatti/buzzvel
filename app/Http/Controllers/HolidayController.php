<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayRequest;
use App\Models\HolidayModel;

class HolidayController extends Controller
{
    public function getAllHolidays() : object
    {
        return HolidayModel::all();
    }

    public function createHoliday(HolidayRequest $request)
    {
        $valid = $request->validated();
        $data = $request->only(['title', 'description', 'date', 'participants', 'location']);

        if ($valid) {
            $holiday = HolidayModel::create($data);

            return \response()->json(['status' => true, 'message' => 'Holiday created!']);
        }
    }
}
