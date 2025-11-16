@extends('layouts.admin')

@section('page-title', 'Settings Management')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Contact Settings</h2>
        <p class="text-slate-600 mt-1">Manage your business contact information and availability</p>
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

    <!-- Settings Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-8">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
            @csrf

            <!-- Contact Number Field -->
            <div>
                <label for="contact_number" class="block text-sm font-medium text-slate-700 mb-2">Main Contact Number</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                    </div>
                    <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $contactNumber) }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="e.g., +6281234567890">
                </div>
                <p class="mt-2 text-xs text-slate-500">Primary phone number for business inquiries.</p>
            </div>

            <!-- Contact Email Field -->
            <div>
                <label for="contact_email" class="block text-sm font-medium text-slate-700 mb-2">Contact Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                    </div>
                    <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $contactEmail) }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="e.g., info@ticash.com">
                </div>
                <p class="mt-2 text-xs text-slate-500">Primary email address for customer inquiries.</p>
            </div>

            <!-- WhatsApp Number Field -->
            <div>
                <label for="whatsapp_number" class="block text-sm font-medium text-slate-700 mb-2">WhatsApp Number</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg>
                    </div>
                    <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $whatsappNumber) }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="e.g., +6281234567890">
                </div>
                <p class="mt-2 text-xs text-slate-500">WhatsApp number for direct customer support.</p>
            </div>

            <!-- WhatsApp Default Message Field -->
            <div>
                <label for="whatsapp_default_message" class="block text-sm font-medium text-slate-700 mb-2">WhatsApp Default Message</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg>
                    </div>
                    <input type="text" id="whatsapp_default_message" name="whatsapp_default_message" value="{{ old('whatsapp_default_message', $whatsappDefaultMessage) }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="e.g., Halo, saya tertarik dengan sistem ticash">
                </div>
                <p class="mt-2 text-xs text-slate-500">Default message that appears when users contact via WhatsApp.</p>
            </div>

            <!-- Office Hours Field -->
            <div>
                <label for="office_hours" class="block text-sm font-medium text-slate-700 mb-2">Office Hours</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                    <input type="text" id="office_hours" name="office_hours" value="{{ old('office_hours', $officeHours) }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="e.g., Monday-Friday, 9AM-5PM">
                </div>
                <p class="mt-2 text-xs text-slate-500">Specify your operating hours for customer reference.</p>
            </div>

            <!-- User Count Field -->
            <div>
                <label for="user_count" class="block text-sm font-medium text-slate-700 mb-2">Total Users Count</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <input type="number" id="user_count" name="user_count" value="{{ old('user_count', $userCount ?? 0) }}" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter total user count">
                </div>
                <p class="mt-2 text-xs text-slate-500">Total number of users to display on the landing page counter.</p>
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
                    Update Settings
                </button>
            </div>
        </form>
    </div>

    <!-- Additional Info Section -->
    <div class="mt-6 pt-6 border-t border-slate-200 text-sm text-slate-600">
        <div class="flex flex-col sm:flex-row items-center justify-between">
            <div class="flex items-center space-x-3 mb-2 sm:mb-0">
                <div class="flex items-center space-x-1.5">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-xs font-medium text-slate-700">Settings Active</span>
                </div>
                <span class="hidden sm:inline text-slate-300">•</span>
                <span class="block sm:inline text-xs">Last updated: <span class="font-medium text-slate-800">{{ now()->format('M d, Y \a\t g:i A') }}</span></span>
            </div>
            <div class="flex items-center space-x-2 text-xs bg-slate-100 text-slate-700 px-3 py-1 rounded-full">
                <svg class="w-4 h-4 text-slate-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
                <span>4 Fields • Secure</span>
            </div>
        </div>
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
