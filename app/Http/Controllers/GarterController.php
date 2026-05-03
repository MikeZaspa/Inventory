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
                ->get(['id', 'garter as inches', 'quantity', 'created_at']),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            Garter::query()->latest()->get(['id', 'garter as inches', 'quantity', 'created_at'])
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'inches' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $garter = Garter::create([
            'garter' => $validated['inches'],
            'black_edge' => $validated['inches'],
            'quantity' => $validated['quantity'],
        ]);

        return response()->json([
            'message' => 'Inches entry created successfully.',
            'data' => $garter,
        ], 201);
    }

    public function update(Request $request, Garter $garter): JsonResponse
    {
        $validated = $request->validate([
            'inches' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $garter->update([
            'garter' => $validated['inches'],
            'black_edge' => $validated['inches'],
            'quantity' => $validated['quantity'],
        ]);

        return response()->json([
            'message' => 'Inches entry updated successfully.',
            'data' => $garter->fresh(),
        ]);
    }

    public function destroy(Garter $garter): JsonResponse
    {
        $garter->delete();

        return response()->json([
            'message' => 'Inches entry deleted successfully.',
        ]);
    }
}
