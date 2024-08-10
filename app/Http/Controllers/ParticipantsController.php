<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantsRequest;
use App\Http\Resources\ParticipantsResource;
use App\Models\ParticipantsModel;

class ParticipantsController extends Controller
{
    public function getAllParticipants() : object|array
    {
        $participants = ParticipantsModel::all();
        return \response()->json(count($participants) > 0 ? ['status' => true,
        'participants' => ParticipantsResource::collection($participants)] : ['status' => false, 'message' => 'No participats found'] );
    }

    public function getParticipant(ParticipantsRequest $request) : object
    {
        $request->validated();

        $id = $request->id;
        $name = $request->name;

        if ($id) {
            $participant = ParticipantsModel::find($id);
        }

        if ($name) {
            $participant = ParticipantsModel::where('name', 'like', '%' . $name . '%')->get();
            $participant = count($participant) >0 ? $participant : null;
        }

        if ($participant) {
            return \response()->json(['status' => true, 'participant' => $participant]);
        }

        return \response()->json(['status' => false, 'message' => 'User not found!']);
    }

    public function createParticipant(ParticipantsRequest $request)
    {
        $request->validated();
        ParticipantsModel::create($request->all());
        return \response()->json(['status' => true, 'message' => 'Participant created!']);
    }
}
