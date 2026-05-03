<?php

namespace App\Http\Controllers;

use App\Models\ThreadAppleBrand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ThreadAppleBrandController extends Controller
{
    public function page(): View
    {
        return view('auth.thread-apple-brand', [
            'threadAppleBrands' => ThreadAppleBrand::query()
                ->latest()
                ->get(['id', 'name', 'quantity', 'created_at']),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            ThreadAppleBrand::query()->latest()->get(['id', 'name', 'quantity', 'created_at'])
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $threadAppleBrand = ThreadAppleBrand::create($validated);

        return response()->json([
            'message' => 'Thread Apple Brand entry created successfully.',
            'data' => $threadAppleBrand,
        ], 201);
    }

    public function update(Request $request, ThreadAppleBrand $threadAppleBrand): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $threadAppleBrand->update($validated);

        return response()->json([
            'message' => 'Thread Apple Brand entry updated successfully.',
            'data' => $threadAppleBrand->fresh(),
        ]);
    }

    public function destroy(ThreadAppleBrand $threadAppleBrand): JsonResponse
    {
        $threadAppleBrand->delete();

        return response()->json([
            'message' => 'Thread Apple Brand entry deleted successfully.',
        ]);
    }
}
