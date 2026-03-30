<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', function (Request $request) {
        $validated = $request->validate([
            'email' => ['nullable', 'email'],
            'password' => ['nullable', 'string'],
        ]);

        $credentials = [
            'email' => $validated['email'] ?: (string) env('ADMIN_EMAIL', 'michellenepangue55@gmail.com'),
            'password' => $validated['password'] ?: (string) env('ADMIN_PASSWORD', 'combat123@'),
        ];

        $remember = $request->boolean('remember');

        if (! Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])
                ->onlyInput('email', 'remember');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    })->name('login.store');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->middleware('auth')->name('logout');
