<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayRequest;
use App\Http\Requests\AddParticipantsRequest;
use App\Http\Requests\UpdateHolidayRequest;
use App\Http\Resources\HolidayResource;
use App\Models\HolidayModel;
use App\Models\HolidaysParticipantsModel;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function getAllHolidays()
    {
        return \response()->json(['status' => true, 'holidays' => HolidayResource::collection(HolidayModel::all())]);
    }

    public function createHoliday(HolidayRequest $request) : array|object
    {
        $valid = $request->validated();
        $data = $request->only(['title', 'description', 'date', 'participants', 'location']);

        if ($valid) {
            HolidayModel::create($data);
            return \response()->json(['status' => true, 'message' => 'Holiday created!']);
        }
    }

    public function getHolydayByID(Request $request) : array|object
    {
        $holiday = HolidayModel::find($request->id);
        if ($holiday) {
            return \response()->json(['status' => true, 'holiday' => $holiday]);
        }
        return \response()->json(['status' => false, 'message' => 'Holiday not found!']);
    }

    public function addParticipants(AddParticipantsRequest $request): array|object
    {
        $request->validated();
        foreach ($request->participants as $key => $participant) {
            HolidaysParticipantsModel::create(['id_holiday' => $request->holiday, 'id_participant' => $participant]);
        }

        return \response()->json(['status' => true, 'message' => 'All participants was added!']);
    }

    public function updateHoliday(UpdateHolidayRequest $request) : array|object
    {

        $request->validated();
        $update = HolidayModel::where('id', $request->id)->update($request->all());

        if ($update) {
            return \response()->json(['status' => true, 'message' => 'Holiday updated!']);
        }

        return \response()->json(['status' => false, 'message' => 'Was not possible to update']);
    }
}
