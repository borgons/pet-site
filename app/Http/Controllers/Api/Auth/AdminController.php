<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request){

        $fields = $request->validate([
            'userID' => 'required',
            'userFirst' => 'required|string',
            'userLast' => 'required|string',
            'userPosition' => 'required|string',
            'userPassword' => 'required|string|confirmed', 
        ]);

        $user = User::create([
            'userID' => $fields['userID'],
            'userFirst' => $fields['userFirst'],
            'userLast' => $fields['userLast'],
            'userPosition' => $fields['userPosition'],
            'userPassword' => bcrypt($fields['userPassword'])
        ]);

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function login(Request $request){

        $fields = $request->validate([
            'userID' => 'required',
            'userPassword' => 'required|string'
        ]);

        // Check Username
        $user = User::where('userID', $fields['userID'])->first();

        //Check Password
        if(!$user || !Hash::check($fields['userPassword'], $user->userPassword)){
            return response()->json(
                [
                    'message' => 'Bad Credentials. Please Try Again '
                ]
            , 401);
        }

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function logout(){
        Auth::logout();

        return [
            'message' => 'Your Logging-Out'
        ];
    }
}
