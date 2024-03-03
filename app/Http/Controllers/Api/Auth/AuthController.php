<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Api\AuthRequest;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        // User credentials...
        // $creds = $request->only(
        //     [
        //         'email',
        //         'password',
        //         'device_name'
        //     ]
        // );
        $user = User::where('email', $request->email)->first();

        // if dosent fund user and or password doesent match
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }
        // delete all tokens , logout othere devices
        // if ($request->has('logout_other_devices'))
        // $user->tokens()->delete();

        // delete all tokens , unique login
        $user->tokens()->delete();


        // create token for user
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'token' => $token,
        ]);
    }
    public function logout(){
        // get authenticated user nad delete all tokens
        auth()->user()->tokens()->delete();
        return response()->json([
            'token' => 'Sucess',
        ]);
    }
    // return the user
    public function me(Request $request) {
        $user = $request->user();
        return response()->json([
            'me' => $user
        ]);
    }
}
