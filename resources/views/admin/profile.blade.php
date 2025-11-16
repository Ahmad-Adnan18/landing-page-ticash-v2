@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Account Credentials</h2>
        <p class="text-slate-600 mt-1">Manage your username and password</p>
    </div>

    <!-- Success Message (Shadcn Style) -->
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <polyline points="22 4 12 14.01 9 11.01" />
            </svg>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <!-- Profile Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-8">
        <form method="POST" action="{{ route('admin.update.credentials') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-sm font-medium text-slate-700 mb-2">Current Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 10V8a2 2 0 1 1 4 0v2" />
                            <path d="M7 10h10" />
                            <rect width="18" height="12" x="3" y="10" rx="2" />
                        </svg>
                    </div>
                    <input type="password" id="current_password" name="current_password" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter your current password" required>
                </div>
                @error('current_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Username -->
            <div>
                <label for="new_username" class="block text-sm font-medium text-slate-700 mb-2">New Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>
                    <input type="text" id="new_username" name="new_username" value="{{ old('new_username', $admin->username) }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter new username" required>
                </div>
                @error('new_username')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-xs text-slate-500">Username must be unique and at least 3 characters long</p>
            </div>

            <!-- New Password -->
            <div>
                <label for="new_password" class="block text-sm font-medium text-slate-700 mb-2">New Password (Optional)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                    </div>
                    <input type="password" id="new_password" name="new_password" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter new password (leave blank to keep current)">
                </div>
                @error('new_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-xs text-slate-500">Password must be at least 8 characters long (optional)</p>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="new_password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirm New Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                    </div>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Confirm your new password">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-slate-100">
                <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 transition-colors
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
                               disabled:opacity-70 disabled:cursor-not-allowed">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                        <polyline points="17 21 17 13 7 13 7 21" />
                        <polyline points="7 3 7 8 15 8" />
                    </svg>
                    Update Credentials
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Add loading state to form submission
    document.querySelector('form').addEventListener('submit', function() {
        const button = this.querySelector('button[type="submit"]');

        // Simpan teks tombol asli
        const originalContent = button.innerHTML;

        // Set tombol ke mode loading
        button.innerHTML = `
            <svg class="animate-spin -ml-1 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="ml-2">Updating...</span>
        `;
        button.disabled = true;
    });

</script>
@endsection
