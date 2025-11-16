@extends('layouts.admin')

@section('page-title', 'Testimonials Management')

@section('content')
<div class="max-w-7xl mx-auto" x-data="testimonialManager">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Testimonials Management</h2>
        <p class="text-slate-600 mt-1">Manage customer feedback and reviews</p>
    </div>

    <!-- Success Message -->
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

    <!-- Add Testimonial Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-8 mb-8">
        <h3 class="text-lg font-semibold text-slate-900 mb-6">Add New Testimonial</h3>

        <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter customer name" required>
                    </div>
                </div>

                <div>
                    <label for="position" class="block text-sm font-medium text-slate-700 mb-2">Position</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                            </svg>
                        </div>
                        <input type="text" id="position" name="position" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="e.g., Bendahara, Wali Santri" required>
                    </div>
                </div>

                <div>
                    <label for="institution" class="block text-sm font-medium text-slate-700 mb-2">Institution/Company</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <input type="text" id="institution" name="institution" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="e.g., Ponpes Al-Amanah" required>
                    </div>
                </div>

                <div>
                    <label for="avatar" class="block text-sm font-medium text-slate-700 mb-2">Avatar/Photo (Optional)</label>
                    <input type="file" id="avatar" name="avatar" accept="image/*" class="w-full text-sm text-slate-500 border border-slate-300 rounded-lg
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-l-lg file:border-0
                                  file:bg-slate-100 file:font-semibold file:text-slate-700
                                  hover:file:bg-slate-200 transition-colors cursor-pointer
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-slate-500 mt-2">JPG, PNG, WEBP, max 2MB</p>
                </div>
            </div>

            <div>
                <label for="quote" class="block text-sm font-medium text-slate-700 mb-2">Customer Quote</label>
                <textarea id="quote" name="quote" rows="4" class="w-full px-3 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter the customer's testimonial quote..." required></textarea>
            </div>

            <div class="pt-4 border-t border-slate-100">
                <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 transition-colors
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
                               disabled:opacity-70 disabled:cursor-not-allowed">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    Add Testimonial
                </button>
            </div>
        </form>
    </div>

    <!-- Testimonials List Card -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-slate-900">All Testimonials</h3>
            <p class="text-sm text-slate-500 mt-1">{{ count($testimonials) }} total testimonials</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Position</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Institution</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Feedback</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center mr-3 flex-shrink-0">
                                    @if($testimonial->avatar_path)
                                    <img src="{{ Storage::url($testimonial->avatar_path) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover rounded-full">
                                    @else
                                    <span class="font-medium text-slate-600">{{ substr($testimonial->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-slate-900">{{ $testimonial->name }}</div>
                                    <div class="text-xs text-slate-500">ID: {{ $testimonial->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900">{{ $testimonial->position }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900">{{ $testimonial->institution }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs">
                                <p class="text-sm text-slate-900 truncate" title="{{ $testimonial->quote }}">
                                    {{ $testimonial->quote }}
                                </p>
                                <div class="text-xs text-slate-500 mt-1">
                                    {{ $testimonial->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button type="button" @click="openDeleteModal({{ $testimonial->id }}, '{{ addslashes($testimonial->name) }}', '{{ route('admin.testimonials.delete', $testimonial->id) }}')" class="text-red-600 hover:text-red-800 hover:bg-red-50 p-2 rounded-md transition-colors">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-slate-300 mb-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                                    <path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                                </svg>
                                <h3 class="text-lg font-medium text-slate-900 mb-1">No testimonials found</h3>
                                <p class="text-slate-500">Start by adding your first customer testimonial</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal (Alpine.js) -->
    <div x-show="showModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50 flex items-center justify-center p-4" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="closeModal">
        <div @click.stop class="bg-white rounded-lg shadow-lg max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 19c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="ml-3 text-lg font-semibold text-slate-900">Confirm Deletion</h3>
                </div>

                <p class="text-slate-700 mb-6">
                    Are you sure you want to delete the testimonial from <span class="font-medium text-slate-900" x-text="testimonialToDelete.name"></span>? This action cannot be undone.
                </p>

                <div class="flex justify-end space-x-3">
                    <button type="button" @click="closeModal" class="px-4 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors">
                        Cancel
                    </button>
                    <form :action="testimonialToDelete.action" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('testimonialManager', () => ({
            showModal: false
            , testimonialToDelete: {
                id: null
                , name: ''
                , action: ''
            },

            openDeleteModal(id, name, action) {
                this.testimonialToDelete = {
                    id
                    , name
                    , action
                };
                this.showModal = true;
            },

            closeModal() {
                this.showModal = false;
                this.testimonialToDelete = {
                    id: null
                    , name: ''
                    , action: ''
                };
            }
        }));
    });

</script>
@endsection
