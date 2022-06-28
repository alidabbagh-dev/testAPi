<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Teacher;

class testApiController extends Controller
{
    //
    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            ['name' => "required"],
            ['email' => 'required|email|unique:teachers'],
            ["password" => "required|min:8"]
        );

        if($validator->fails()) {
            return response()->json([
                "code" => 400,
                "success" => false,
                "messages" => $validator->messages(),
                "data" => []
            ])->header("Content_Type" , "application/json");
        }
        Teacher::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        $token = auth("testApi")->attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        return response()->json([
            "code" => 201,
            "success" => true,
            "messages" => ["user has been created"],
            "data" => ["token" => $token]
        ]);

    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()) {
            return response()->json([
                "code" => 400,
                "success" => false,
                "messages" => $validator->messages(),
                "data" => []
            ]);
        }

        if(!$token = auth("testApi")->attempt([
            "email" => $request->email,
            "password" => $request->password
        ])){
            return response()->json([
                "code" => 401,
                "success" => false,
                "messages" => ["Unauthorized"],
                "data" => []
            ]);
        }

        return response()->json([
            "code" => 200,
            "success" => true,
            "messages" => ["user has been logged in"],
            "data" => ["token" => $token]
        ]);
    }

    public function profile(Request $request) {
        $teacher = auth("testApi")->user();
        return response()->json([
            "code" => 200,
            "success" => true,
            "messages" => ["user profile"],
            "data" => $teacher
        ]);
    }

    public function logout(Request $request) {
        auth("testApi")->logout();
        return response()->json([
            "code" => 200,
            "success" => true,
            "messages" => ["User Has Been Logged Out"],
            "data" => []
        ]);
    }

}
