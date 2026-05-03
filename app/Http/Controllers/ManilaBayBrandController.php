<?php

namespace App\Http\Controllers;

use App\Models\ManilaBayBrand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManilaBayBrandController extends Controller
{
    public function page(): View
    {
        return view('auth.manila-bay-brand', [
            'manilaBayBrands' => ManilaBayBrand::query()
                ->latest()
                ->get(['id', 'color', 'qty', 'created_at']),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            ManilaBayBrand::query()->latest()->get(['id', 'color', 'qty', 'created_at'])
        );
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'color' => ['required', 'string', 'max:120'],
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        $record = ManilaBayBrand::create($validated);

        return response()->json([
            'message' => 'Manila Bay record created successfully.',
            'data' => $record,
        ], 201);
    }

    public function update(Request $request, ManilaBayBrand $manilaBayBrand): JsonResponse
    {
        $validated = $request->validate([
            'color' => ['required', 'string', 'max:120'],
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        $manilaBayBrand->update($validated);

        return response()->json([
            'message' => 'Manila Bay record updated successfully.',
            'data' => $manilaBayBrand->fresh(),
        ]);
    }

    public function destroy(ManilaBayBrand $manilaBayBrand): JsonResponse
    {
        $manilaBayBrand->delete();

        return response()->json([
            'message' => 'Manila Bay record deleted successfully.',
        ]);
    }
}
