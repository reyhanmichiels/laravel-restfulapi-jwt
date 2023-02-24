<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request, User $user)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors()
            ]);
        }

        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'message' => "Register succesed"
        ]);
    }

    public function login($request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors()
            ]);
        }

        $credentials = $request->only("email", "password");

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'error' => "Unauthorized"
            ]);
        }

        return response()->json([
            'message' => "login succesed",
            'token' => $token
        ]);
    }

    public function logout()
    {
        Auth::logout();
        
        return response()->json([
            'message' => "logout succesed"
        ]);
    }
}


