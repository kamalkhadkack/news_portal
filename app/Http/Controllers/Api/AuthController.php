<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required|min:6',

        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
            ]);
        }

        $Admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = $Admin->createToken($request->email)->plainTextToken;
        $date = [
            "subject" => "welcome To our website",
            "name" => $request->name,
            "massage" => "your account is created successfully",
        ];
        Mail::to($request->email)->send(new EmailNotification($date));


        return response()->json([
            "status" => true,
            "admin" => $Admin,
            "token" => $token,
            "message" => "Admin created successfully",
        ]);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
            ]);
        }

        $Admin = Admin::where('email', $request->email)->first();
        if (!$Admin || !Hash::check($request->password, $Admin->password)) {
            return response()->json([
                "status" => false,
                "message" => "Useremail or password  incorrect",
            ]);
        }

        $token = $Admin->createToken($request->email)->plainTextToken;


        return response()->json([
            "status" => true,
            "admin" => $Admin,
            "token" => $token,
            "message" => "LogIn successfully",
        ]);
    }
    public function logout()
    {
        $admin = auth()->user();
        $admin->tokens()->delete();
        return response()->json([
            "status" => true,
            "message" => "LogOut successfully",
        ]);
    }
}
