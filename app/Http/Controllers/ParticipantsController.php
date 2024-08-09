<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantsRequest;
use App\Models\ParticipantsModel;
use Illuminate\Http\Request;
use App\http\Resources\ParticipantsResource;

class ParticipantsController extends Controller
{
    public function getAllParticipants() : object
    {
        $participants =  ParticipantsModel::all();
        return ParticipantsResource::collection($participants);
    }

    public function getParticipant(Request $request) : object
    {
        $id = $request->id;
        $name = $request->name;

        if ($id) {
            return ParticipantsModel::find($id);
        }

        if ($name) {
            return ParticipantsModel::where('name', $name)->first();
        }

        return ['status' => false, 'message' => 'User not found!'];
    }

    public function createParticipant(ParticipantsRequest $request)
    {
        $request->validated();
        ParticipantsModel::create($request->all());
        return ['status' => true, 'message' => 'Participant created!'];
    }
}
