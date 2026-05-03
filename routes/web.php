<?php

use App\Http\Controllers\ChordController;
use App\Http\Controllers\GarterController;
use App\Http\Controllers\PeactwillController;
use App\Models\Chord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

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

    return redirect()->route('dashboard');
})->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('auth.dashboard', [
            'totalChords' => Chord::count(),
            'totalSizes' => Chord::query()->distinct('size')->count('size'),
            'latestChord' => Chord::query()->latest()->value('chord') ?? '-',
        ]);
    })->name('dashboard');
    Route::get('/chord', [ChordController::class, 'page'])->name('chord');
    Route::get('/chords', [ChordController::class, 'index'])->name('chords.index');
    Route::post('/chords', [ChordController::class, 'store'])->name('chords.store');
    Route::put('/chords/{chord}', [ChordController::class, 'update'])->name('chords.update');
    Route::delete('/chords/{chord}', [ChordController::class, 'destroy'])->name('chords.destroy');
    Route::get('/garter', [GarterController::class, 'page'])->name('garter');
    Route::get('/garters', [GarterController::class, 'index'])->name('garters.index');
    Route::post('/garters', [GarterController::class, 'store'])->name('garters.store');
    Route::put('/garters/{garter}', [GarterController::class, 'update'])->name('garters.update');
    Route::delete('/garters/{garter}', [GarterController::class, 'destroy'])->name('garters.destroy');
    Route::view('/thread-apple-brand', 'auth.thread-apple-brand')->name('thread-apple-brand');
    Route::get('/peactwill', [PeactwillController::class, 'page'])->name('peactwill');
    Route::get('/peactwills', [PeactwillController::class, 'index'])->name('peactwills.index');
    Route::post('/peactwills', [PeactwillController::class, 'store'])->name('peactwills.store');
    Route::put('/peactwills/{peactwill}', [PeactwillController::class, 'update'])->name('peactwills.update');
    Route::delete('/peactwills/{peactwill}', [PeactwillController::class, 'destroy'])->name('peactwills.destroy');

    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
});
