<?php

namespace App\Modules\Auth\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginRepositoryByEmail implements ILoginRepository
{
  public function checkCredential(array $credential)
  {
    return Auth::attempt($credential);
  }

  public function findUserByEmail($email)
  {
    return User::where('email', $email)->firstOrFail();    
  }

  public function getAccessToken(User $user)
  {
    return $user->createToken('APIToken')->plainTextToken;    
  }
}