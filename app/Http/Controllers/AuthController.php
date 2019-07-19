<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function ShowRegisterPage()
  {
    return view('register');
  }

  public function RegisterUser(RegisterUserRequest $request)
  {
    $name = $request->get('name');
    $email = $request->get('email');
    $password = $request->get('password');
    $account_type = $request->get('account_type');

    $user = User::create([
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'account_type' => strtolower($account_type)
    ]);

    return redirect()->route('login')->with('user', $user);
  }

  public function ShowLoginPage()
  {
    return view('login', ['user' => session('user')]);
  }

  public function LoginUser(LoginUserRequest $request)
  {
    $email = $request->get('email');
    $password = $request->get('password');

    $user = User::where('email', $email)->first();

    if (Hash::check($password, $user->password)) {
      Auth::login($user);

      return redirect()->route('home');
    } else {
      return redirect()->route('login')->withErrors([
        'failed' => __('auth.failed')
      ]);
    }
  }

  public function LogoutUser()
  {
    Auth::logout();
    return redirect()->route('home');
  }
}
