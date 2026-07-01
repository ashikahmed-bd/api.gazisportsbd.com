<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('phone', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to login with the provided credentials. Please check your email and password.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = $request->user();

        // Check if disabled
        if ($user->disabled) {
            Auth::logout();
            return response()->json([
                'success' => false,
                'message' => 'Your account has been disabled. Please contact support.',
            ], Response::HTTP_FORBIDDEN);
        }

        return response()->json([
            'message' => 'You are logged in successfully!',
            'type' => 'Bearer',
            'token' => $user->createToken('auth_token', [$user->role], now()->addWeek())->plainTextToken,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'role' => $user->role,
                'photo_url' => $user->photo_url,
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:6'],
        ]);


        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful! Your account has been created.',
        ], Response::HTTP_CREATED);
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', Rule::exists('users', 'phone')],
        ]);

        $user = User::query()->where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'This phone number is not registered.'
            ], 404);
        }

        $password = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Update password
        $user->update([
            'password' => bcrypt($password)
        ]);


        return response()->json([
            'success' => true,
            'message' => 'A new password has been successfully sent to your phone. Please check your SMS inbox.'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ], Response::HTTP_OK);
    }
}
