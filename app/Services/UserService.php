<?php

namespace App\Services;

use App\Models\User;

class UserService
{

  public function create(array $data): User
  {
    // ✅ Create a new User and hash the password
    // bcrypt() ensures the password is securely stored.
    $user = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);

    return $user;
  }

  public function addEmployer(User $user, $employer, $logoPath){
    $user->employer()->create([
      'name' => $employer,
      'logo' => $logoPath,
    ]);
  }
}
