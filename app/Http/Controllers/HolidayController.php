<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayRequest;
use App\Http\Requests\AddParticipantsRequest;
use App\Http\Requests\UpdateHolidayRequest;
use App\Models\HolidayModel;
use App\Models\HolidaysParticipantsModel;
use App\Models\FullDataModel;
use App\Models\ParticipantsModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    private array $data;

    public function getAllHolidays() : array|object
    {
        $holidays = FullDataModel::all();
        foreach ($holidays as $key => $holiday) {
            $participantsArray = [];
            $participants = HolidaysParticipantsModel::where('id_holiday', $holiday->id)->get();
            foreach ($participants as $key => $participant) {
                $name = ParticipantsModel::where('id', $participant->id_participant)->get('name');
                $participantsArray[] = $name[0]->name;
            }
            $holiday->participants = $participantsArray;
        }
        return $holidays;
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

    public function getPDF(Request $request)
    {
        $holiday = FullDataModel::find($request->id);
        $participantsArray = [];
        $participants = HolidaysParticipantsModel::where('id_holiday', $request->id)->get();
        foreach ($participants as $key => $participant) {
            $name = ParticipantsModel::where('id', $participant->id_participant)->get('name');
            $participantsArray[] = $name[0]->name;
        }
        $holiday->participants = $participantsArray;

        $this->data['holiday'] = $holiday;


        $pdf = Pdf::loadView('pdf', $this->data);
        // return $pdf->stream();
        return $pdf->download('holiday.pdf');
        // return \view('pdf', $this->data);
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
