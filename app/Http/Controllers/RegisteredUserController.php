<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\UserService;
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
  public function store(RegisterUserRequest $request, UserService $userService)
  {

    $user = $userService->create($request->all());

    $logoPath = $request->file('logo')->store('logos');

    $userService->addEmployer($user, $request['employer'], $logoPath);

    // ✅ Log in the new user immediately after registration
    Auth::login($user);

    return redirect('/'); // or wherever you want to send the user after registration
  }
}
