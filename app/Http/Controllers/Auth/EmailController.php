<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    // Verify Email Form
    public function verifyEmailForm()
    {
        $data = ['title' => 'Verify Email | FAMS'];

        return view('auth.verify-email', $data);
    }

    // Verify Email
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('login.form')->with('success', 'Your Email has been successfully verified.');
    }

    // Resending Verify Email
    public function verifyEmailNotice(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
}
