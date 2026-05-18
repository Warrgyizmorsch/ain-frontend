<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, create session
            $request->session()->regenerate();

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }


}
