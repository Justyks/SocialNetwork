<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    protected $redirectTo = "/chat";

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register', 'getCSRF']]);
    }

    public function register(SignUpRequest $request)
    {
        $validated = $request->validated();
        $user = new User($validated);
        $user->save();
        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function showSignUpForm()
    {
        return view('auth.signUp');
    }

    public function getCSRF(){
        return csrf_token();
    }
}
