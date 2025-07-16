<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
{
    // Validate the email
    $request->validate([
        'email' => ['required', 'email'],
    ]);
    
    // Attempt to send the reset link
    $status = Password::sendResetLink(
        $request->only('email')
    );

    // Check if the reset link was sent successfully or if there was an error
    if ($status == Password::RESET_LINK_SENT) {
        // Return JSON response if the reset link is successfully sent
        return response()->json([
            'message' => 'Password reset link sent to your email.',
            'status' => 'success'
        ], 200);
    }

    // Return JSON response if the email was not found or there was an error
    return response()->json([
        'message' => 'Email not found or unable to send reset link.',
        'status' => 'error'
    ], 400);
}
}
