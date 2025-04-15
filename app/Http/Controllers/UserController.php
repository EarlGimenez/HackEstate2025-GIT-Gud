<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function getUser($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'code' => 404,
            'message' => 'User not found'
        ], 404);
    }

    return response()->json([
        'code' => 200,
        'user' => $user
    ], 200);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'code' => 200,
            'message' => 'Logged out successfully'
        ], 200);
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'message' => $validate->messages()
            ], 422);
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'code' => 200,
                'message' => 'User logged in successfully'
            ], 200);
        }

        return response()->json([
            'code' => 401,
            'message' => 'Invalid credentials'
        ], 401);
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => ['required', 'string', 'unique:users,username'],
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'is_broker' => ['required', 'boolean'],
            'is_agent' => ['required', 'boolean'],
            'is_buyer' => ['required', 'boolean'],
            'license_number' => ['required_if:is_broker,true,is_agent,true', 'string', 'nullable'],
            'license_expiration_date' => ['required_if:is_broker,true,is_agent,true', 'date', 'nullable'],
            'agency_name' => ['required_if:is_broker,true,is_agent,true', 'string', 'nullable'],
            'phone_number' => ['required', 'regex:/^[0-9]{10,15}$/'],
            'terms_agreed' => ['required', 'accepted'],
        ]);

        if ($validate->fails()) {
            return response()->json([
                'code' => 422,
                'message' => $validate->messages()
            ], 422);
        }

        $user = new User;
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_broker = $request->is_broker;
        $user->is_agent = $request->is_agent;
        $user->is_buyer = $request->is_buyer;
        $user->license_number = $request->license_number;
        $user->license_expiration_date = $request->license_expiration_date;
        $user->agency_name = $request->agency_name;
        $user->phone_number = $request->phone_number;
        $user->terms_agreed = $request->terms_agreed;
        $user->save();

        return response()->json([
            'code' => 200,
            'message' => 'User registered successfully',
            'user' => [
                'username' => $user->username,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'roles' => [
                    'is_broker' => $user->is_broker,
                    'is_agent' => $user->is_agent,
                    'is_buyer' => $user->is_buyer
                ]
            ]
        ], 200);
    }

    public function show($id)
    {
        // Fetch the user data
        $user = User::findOrFail($id); // Or use Eloquent if you need custom queries

        // Pass the user data to the view
        return view('frontend/userProfile', compact('user'));
    }
}
