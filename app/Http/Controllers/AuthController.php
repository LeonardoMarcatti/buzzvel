<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogupRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logup(LogupRequest $request) : object
    {
        $valid = $request->validated();

        if ($valid) {
            User::create($request->only(['name', 'email', 'password']));
        }

        return \response()->json(['status' => true, 'message' => 'User created!']);
    }

    public function login(LoginRequest $request) : object
    {
        $valid = $request->validated();

        if ($valid && Auth::attempt($request->only(['email', 'password']))) {
            $token = $request->user()->createToken('MyToken');

            return \response()->json(['status' => true, 'token' => $token->plainTextToken]);
        }

            return \response()->json(['status' => false, 'message' => 'User not found']);
    }

    public function logout()
    {
        $result = Auth::user()->tokens()->delete();

        if ($result) {
            return ['status' => true, 'message' => 'You have loged out!'];
        }

        return ['status' => false, 'message' => 'It was not possible to logout'];
    }
}
