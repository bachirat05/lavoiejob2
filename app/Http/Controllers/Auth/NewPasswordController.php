<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
{
    // Validate the required fields
    $request->validate([
        'token' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Attempt to reset the password
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user) use ($request) {
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ])->save();

            // Fire the password reset event
            event(new PasswordReset($user));
        }
    );

    // Check if the password reset was successful
    if ($status == Password::PASSWORD_RESET) {
        return response()->json([
            'message' => 'Password has been successfully reset.',
            'status' => 'success'
        ], 200);
    }

    // Handle specific error responses based on the status
    switch ($status) {
        case Password::INVALID_TOKEN:
            return response()->json([
                'message' => 'The password reset token is invalid or expired.',
                'status' => 'error'
            ], 400);
        
        case Password::INVALID_USER:
            return response()->json([
                'message' => 'No user found with that email address.',
                'status' => 'error'
            ], 404);
        
        default:
            return response()->json([
                'message' => 'An unknown error occurred. Please try again.',
                'status' => 'error'
            ], 500);
    }
}
}
