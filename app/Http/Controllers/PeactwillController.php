<?php

namespace App\Http\Controllers;

use App\Models\Peactwill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PeactwillController extends Controller
{
    public function page(): View
    {
        return view('auth.peactwill', [
            'peactwills' => Peactwill::query()
                ->latest()
                ->get(['id', 'color', 'quantity', 'created_at']),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            Peactwill::query()->latest()->get(['id', 'color', 'quantity', 'created_at'])
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'color' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $peactwill = Peactwill::create($validated);

        return response()->json([
            'message' => 'Peactwill color entry created successfully.',
            'data' => $peactwill,
        ], 201);
    }

    public function update(Request $request, Peactwill $peactwill): JsonResponse
    {
        $validated = $request->validate([
            'color' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $peactwill->update($validated);

        return response()->json([
            'message' => 'Peactwill color entry updated successfully.',
            'data' => $peactwill->fresh(),
        ]);
    }

    public function destroy(Peactwill $peactwill): JsonResponse
    {
        $peactwill->delete();

        return response()->json([
            'message' => 'Peactwill color entry deleted successfully.',
        ]);
    }
}
