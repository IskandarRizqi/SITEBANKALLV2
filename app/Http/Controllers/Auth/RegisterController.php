<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; // ← WAJIB DITAMBAH
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
         return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


     public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
        // Create user
        $user = $this->create($request->all());
        
        // Generate OTP
        $otpCode = rand(100000, 999999);
        
        // Save OTP to database
        OtpCode::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'otp_code' => $otpCode,
            'expires_at' => now()->addMinutes(15),
        ]);
        
        // Send OTP email
        try {
            Mail::to($user->email)->send(new OtpMail($otpCode));
            
            return response()->json([
                'success' => true,
                'message' => 'Registration successful. Please check your email for OTP verification.',
                'user' => $user,
                'debug' => 'Email sent successfully to: ' . $user->email . ' with OTP: ' . $otpCode
            ]);
        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Email sending failed: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Registration successful but failed to send OTP email. Error: ' . $e->getMessage(),
                'debug' => 'Failed to send email to: ' . $user->email . ' with OTP: ' . $otpCode
            ]);
        }
    }


// public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         return redirect()->back()->with('open_form_aduan', true);
//     }

//     return back()->withErrors(['email' => 'Email atau password salah.']);
// }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'uuid' => Str::uuid(),  
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
            'email_verification_token' => Str::random(60),
            'role' => 1,
        ]);
    }
}
