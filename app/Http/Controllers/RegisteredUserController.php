<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // Return the registration view (e.g., auth/register.blade.php)
    return view('auth.register');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // ✅ Validate all required inputs in one single call
    // Separate validation prevents some data from persisting properly.
    $validated = $request->validate([
      'name' => ['required'],
      'email' => ['required', 'string', 'email', 'unique:users,email'],
      'password' => ['required', 'confirmed', Password::min(6)],
      'employer' => ['required'],
      'logo' => ['required', File::types(['jpg', 'jpeg', 'webp', 'png'])->max(1024)],
    ]);

    // ✅ Create a new User and hash the password
    // bcrypt() ensures the password is securely stored.
    $user = User::create([
      'name' => $validated['name'],
      'email' => $validated['email'],
      'password' => bcrypt($validated['password']),
    ]);

    // ✅ Store uploaded logo in storage/app/logos directory
    // The returned value is the relative path to the stored file.

    $logoPath = $request->file('logo')->store('logos');
    // max 1MB


    // ✅ Create a related employer record linked to the user
    // This assumes you have a hasOne() relationship defined in the User model:
    // public function employer() { return $this->hasOne(Employer::class); }
    $user->employer()->create([
      'name' => $validated['employer'],
      'logo' => $logoPath,
    ]);

    // ✅ Log in the new user immediately after registration
    Auth::login($user);

    return redirect('/'); // or wherever you want to send the user after registration
  }
}


// remove all the decription there and update it with this description
// Basic ICT Training
// Web Programming
// CyberSecurity
// Data Analysis
// Prep Classes (SAT, IELTS, JAMB, JUPEB, WAEC, PUTME)
// We sell computer accessories (mouse, keyboard, laptop, etc.)
// Bottom section (contact info): In bold white text, add:
// For more details call:
// (+2348034628203)
// (+2348023984267)
