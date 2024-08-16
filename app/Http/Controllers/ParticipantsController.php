<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantsRequest;
use App\Http\Requests\UpdateParticipantRequest;
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

    public function getParticipant(ParticipantsRequest $request) : object|array
    {

        $search = null;
        $p = $request->p;
        $id = \intval($request->p);
        if ($id != 0) {
            $search = ParticipantsModel::find($id);
        }

        if (!$id) {
            $search = ParticipantsModel::where('name', 'like', '%' . $p . '%')->get();
            $search = count($search) >0 ? $search : null;
        }

        if ($search) {
            return \response()->json(['status' => true, 'participant' => $search]);
        }

        return \response()->json(['status' => false, 'message' => 'User not found!']);
    }

    public function createParticipant(ParticipantsRequest $request) : array|object
    {
        $request->validated();
        ParticipantsModel::create($request->all());
        return \response()->json(['status' => true, 'message' => 'Participant created!'], 200);
    }

    public function updateParticipant(UpdateParticipantRequest $request)  : array|object
    {
        $request->validated();
        $update = ParticipantsModel::where('id', $request->id)->update($request->all());
        if ($update) {
            return \response()->json(['status' => true, 'message' => 'Participant updated!'], 200);
        }
        return \response()->json(['status' => false, 'message' => 'Participant not found!'],200);
    }
}
