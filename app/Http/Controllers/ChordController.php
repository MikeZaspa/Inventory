<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChordController extends Controller
{
    public function page(): View
    {
        return view('auth.chord', [
            'chords' => Chord::query()
                ->latest()
                ->get(['id', 'size', 'chord', 'quantity', 'created_at']),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            Chord::query()->latest()->get(['id', 'size', 'chord', 'quantity', 'created_at'])
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'size' => ['required', 'string', 'max:120'],
            'chord' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $chord = Chord::create($validated);

        return response()->json([
            'message' => 'Chord entry created successfully.',
            'data' => $chord,
        ], 201);
    }

    public function update(Request $request, Chord $chord): JsonResponse
    {
        $validated = $request->validate([
            'size' => ['required', 'string', 'max:120'],
            'chord' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $chord->update($validated);

        return response()->json([
            'message' => 'Chord entry updated successfully.',
            'data' => $chord->fresh(),
        ]);
    }

    public function destroy(Chord $chord): JsonResponse
    {
        $chord->delete();

        return response()->json([
            'message' => 'Chord entry deleted successfully.',
        ]);
    }
}
