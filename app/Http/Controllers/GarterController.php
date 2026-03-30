<?php

namespace App\Http\Controllers;

use App\Models\Garter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GarterController extends Controller
{
    public function page(): View
    {
        return view('auth.garter', [
            'garters' => Garter::query()
                ->latest()
                ->get(['id', 'garter', 'black_edge', 'created_at']),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            Garter::query()->latest()->get(['id', 'garter', 'black_edge', 'created_at'])
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'garter' => ['required', 'string', 'max:120'],
            'black_edge' => ['required', 'string', 'max:120'],
        ]);

        $garter = Garter::create($validated);

        return response()->json([
            'message' => 'Garter entry created successfully.',
            'data' => $garter,
        ], 201);
    }

    public function update(Request $request, Garter $garter): JsonResponse
    {
        $validated = $request->validate([
            'garter' => ['required', 'string', 'max:120'],
            'black_edge' => ['required', 'string', 'max:120'],
        ]);

        $garter->update($validated);

        return response()->json([
            'message' => 'Garter entry updated successfully.',
            'data' => $garter->fresh(),
        ]);
    }

    public function destroy(Garter $garter): JsonResponse
    {
        $garter->delete();

        return response()->json([
            'message' => 'Garter entry deleted successfully.',
        ]);
    }
}
