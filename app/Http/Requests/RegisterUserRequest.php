<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;

class RegisterUserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'name' => ['required'],
      'email' => ['required', 'string', 'email', 'unique:users,email'],
      'password' => ['required', 'confirmed', Password::min(6)],
      'employer' => ['required'],
      'logo' => ['required', File::types(['jpg', 'jpeg', 'webp', 'png'])->max(1024)],
    ];
  }
}
