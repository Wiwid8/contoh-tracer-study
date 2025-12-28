<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Alumni;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'fullname' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'unique:alumnis'],
            'gender' => ['required', 'in:L,P'],
            'date_of_birth' => ['required', 'date'],
            'study_program' => ['required'],
            'graduation_date' => ['required', 'date'],
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'alumni',
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Alumni::create([
            'user_id' => $user->id,
            'fullname' => $request->fullname,
            'nim' => $request->nim,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'study_program' => $request->study_program,
            'graduation_date' => $request->graduation_date,
        ]);

        // Kirim OTP ke email
        Mail::to($user->email)->send(new OtpMail($otp));

        // Redirect ke halaman input OTP
        return redirect()->route('otp.form')->with('email', $user->email);
    }
}
