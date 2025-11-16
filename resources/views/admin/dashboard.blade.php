@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Dashboard Overview</h1>
        <p class="text-slate-600 mt-1">Welcome back! Here's what's happening with ticash today.</p>
    </div>

    <!-- Stats Cards (Shadcn Style) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Testimonials Card -->
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Testimonials</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ \App\Models\Testimonial::count() }}</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                        <path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.testimonials') }}" class="inline-flex items-center text-sm font-medium text-blue-600 mt-4 hover:text-blue-800">
                View Details
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>
        </div>

        <!-- Leads Card -->
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Leads</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ \App\Models\Lead::count() }}</p>
                </div>
                <div class="p-3 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.leads') }}" class="inline-flex items-center text-sm font-medium text-purple-600 mt-4 hover:text-purple-800">
                Manage Leads
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>
        </div>

        <!-- Pending Leads Card -->
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Pending Leads</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ \App\Models\Lead::where('status', 'pending')->count() }}</p>
                </div>
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.leads') }}?status=pending" class="inline-flex items-center text-sm font-medium text-yellow-600 mt-4 hover:text-yellow-800">
                View Pending
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>
        </div>

        <!-- Settings Card -->
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Site Config</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">Updated</p>
                </div>
                <div class="p-3 bg-emerald-100 rounded-lg">
                    <svg class="w-6 h-6 text-emerald-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.47a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.settings') }}" class="inline-flex items-center text-sm font-medium text-emerald-600 mt-4 hover:text-emerald-800">
                Update Settings
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Bottom Row: Charts & Lists -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Leads Distribution Chart -->
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-6">Leads Status Distribution</h3>
            <div class="space-y-4">
                @php
                $pendingCount = \App\Models\Lead::where('status', 'pending')->count();
                $processCount = \App\Models\Lead::where('status', 'process')->count();
                $approvedCount = \App\Models\Lead::where('status', 'approved')->count();
                $rejectedCount = \App\Models\Lead::where('status', 'rejected')->count();
                $totalCount = max(1, \App\Models\Lead::count()); // max(1, ...) to avoid division by zero

                $pendingPercent = round(($pendingCount / $totalCount) * 100, 1);
                $processPercent = round(($processCount / $totalCount) * 100, 1);
                $approvedPercent = round(($approvedCount / $totalCount) * 100, 1);
                $rejectedPercent = round(($rejectedCount / $totalCount) * 100, 1);
                @endphp

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-700">Pending: {{ $pendingCount }}</span>
                        <span class="text-sm text-slate-500">{{ $pendingPercent }}%</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $pendingPercent }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-700">In Process: {{ $processCount }}</span>
                        <span class="text-sm text-slate-500">{{ $processPercent }}%</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $processPercent }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-700">Approved: {{ $approvedCount }}</span>
                        <span class="text-sm text-slate-500">{{ $approvedPercent }}%</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: {{ $approvedPercent }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-700">Rejected: {{ $rejectedCount }}</span>
                        <span class="text-sm text-slate-500">{{ $rejectedPercent }}%</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width: {{ $rejectedPercent }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Leads List -->
        <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-6">Recent Leads</h3>
            <div class="space-y-4">
                @forelse(\App\Models\Lead::orderBy('created_at', 'desc')->take(5)->get() as $lead)
                <div class="flex items-center justify-between border-b border-slate-100 pb-3 last:border-0 last:pb-0">
                    <div>
                        <p class="font-medium text-slate-900">{{ $lead->name }}</p>
                        <p class="text-sm text-slate-500">{{ $lead->pesantren_name }}</p>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                        @if($lead->status === 'pending')
                            bg-yellow-100 text-yellow-800
                        @elseif($lead->status === 'process')
                            bg-blue-100 text-blue-800
                        @elseif($lead->status === 'approved')
                            bg-green-100 text-green-800
                        @elseif($lead->status === 'rejected')
                            bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($lead->status) }}
                    </span>
                </div>
                @empty
                <p class="text-slate-500 text-center py-4">No leads found</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
