<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if(!empty($user)){

            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken("myToken")->accessToken;

                return response()->json([
                    "status" => true,
                    "message" => "User logged in successfully",
                    "token" => $token
                ]);
            }else{
                return response()->json([
                    "status" => false,
                    "message" => "Password didn't match"
                ]);
            }
        }else{
            return response()->json([
                "status" => false,
                "message" => "Invalid credentials"
            ]);
        }
    }

    public function profile(Request $request) {
        $user = $request->user()->load('role','institution');

        $response = [
            'id' => $user->id,
            'title' => $user->title,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'ins_id' => $user->ins_id,
            'phone_no' => $user->phone_no,
            'email' => $user->email,
            'role_id' => $user->role_id,
            'role' => $user->role->name,
            'institution' => $user->institution->wp_name,
        ];

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $user->tokens()->where('id', $request->bearerToken())->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
