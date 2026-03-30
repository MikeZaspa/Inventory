@extends('layouts.dashboard-shell')

@section('title', 'Dashboard | Combat Inventory')

@section('content')
    @php
        $trackedItems = collect(config('inventory.sidebar_items', []))
            ->reject(fn ($item) => $item['slug'] === 'dashboard');
    @endphp

    <div class="panel rounded-[28px] p-6 shadow-2xl sm:p-8">
        <div class="flex flex-col gap-6 xl:flex-row xl:items-start xl:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.25em] text-emerald-200/70">Dashboard</p>
                <h1 class="font-display mt-3 text-4xl font-bold">Welcome, {{ auth()->user()->name }}</h1>
                <p class="mt-3 max-w-2xl text-slate-400">
                    Your admin account is authenticated and the system is ready for inventory management.
                </p>
            </div>

            <div class="rounded-3xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-4">
                <p class="text-sm text-emerald-100/75">Tracked Categories</p>
                <p class="mt-2 text-2xl font-bold text-emerald-300">{{ $trackedItems->count() }}</p>
            </div>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="panel rounded-2xl p-5">
            <p class="text-sm text-slate-400">Signed in as</p>
            <p class="mt-2 text-lg font-semibold">{{ auth()->user()->email }}</p>
        </div>
        <div class="panel rounded-2xl p-5">
            <p class="text-sm text-slate-400">Inventory Sync</p>
            <p class="mt-2 text-lg font-semibold text-emerald-300">Healthy</p>
        </div>
        <div class="panel rounded-2xl p-5">
            <p class="text-sm text-slate-400">Session</p>
            <p class="mt-2 text-lg font-semibold">Active</p>
        </div>
    </div>

    <div class="panel rounded-[28px] p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.22em] text-emerald-200/70">Quick Access</p>
                <h2 class="font-display mt-2 text-2xl font-bold">Inventory Sections</h2>
            </div>
            <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-4 py-2 text-sm text-emerald-200">Ready</span>
        </div>

        <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($trackedItems as $item)
                <a href="{{ route('inventory.page', ['slug' => $item['slug']]) }}" class="rounded-3xl border border-white/10 bg-white/[0.03] p-5 transition hover:border-emerald-400/20 hover:bg-emerald-400/10">
                    <p class="text-sm uppercase tracking-[0.22em] text-emerald-200/70">{{ $item['category'] }}</p>
                    <p class="mt-3 text-xl font-bold">{{ $item['label'] }}</p>
                    <p class="mt-2 text-sm text-slate-400">{{ $item['summary'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
