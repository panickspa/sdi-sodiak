<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /* 
        Register
    */
    public function register(Request $r){
        $data = $r->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191"unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('test')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    /* 
        Login
    */
    public function login(Request $r){
        $data = $r->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $user = User::where('email', $data['email'])->first();
        if(Auth::attempt($r->only('email', 'password'), true)){
            // $r->session()->regenerate();
            $token = $user->createToken('5odi4km1nutlog!n')->plainTextToken;
            return response()->json([
                'user' => Auth::user(),
                'token' => $token
            ], 201); 
        }
        throw ValidationException::withMessages(['message' => 'Invalid Credentials']);
    }

    /* 
        Logout

     */
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }
}
