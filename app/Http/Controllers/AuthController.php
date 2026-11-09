<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'These credentials do not match our records.',
            ]);
        }

        $request->session()->regenerate();

        return $this->redirectByRole(Auth::user());
    }

    public function demo($role)
    {
        abort_unless(app()->environment('local'), 404);

        $emails = [
            'admin'    => 'admin@mubs.ac.ug',
            'lecturer' => 'lecturer@mubs.ac.ug',
            'student'  => 'student@mubs.ac.ug',
        ];
        abort_unless(isset($emails[$role]), 404);

        $user = User::where('email', $emails[$role])->firstOrFail();
        Auth::login($user);
        request()->session()->regenerate();

        return $this->redirectByRole($user);
    }

    protected function redirectByRole($user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->hasRole('lecturer')) {
            return redirect()->route('lecturer.dashboard');
        }
        return redirect()->route('student.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}