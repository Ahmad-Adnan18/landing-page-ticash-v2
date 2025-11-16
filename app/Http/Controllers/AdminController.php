<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Lead;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            session(['admin_logged_in' => true, 'admin_id' => $admin->id]);
            \Log::info('Admin login successful, redirecting to dashboard');
            return redirect('/admin/');
        }

        \Log::info('Admin login failed, redirecting back to form');
        return redirect()->route('admin.login.form')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('admin.login.form');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'quote' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Max 2MB
        ]);

        $testimonialData = $request->only(['name', 'position', 'institution', 'quote']);

        // Handle avatar upload if provided
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatarPath = $request->file('avatar')->store('testimonials', 'public');
            $testimonialData['avatar_path'] = $avatarPath;
        }

        Testimonial::create($testimonialData);

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial added successfully');
    }

    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial deleted successfully');
    }

    public function settings()
    {
        $contactNumber = \App\Models\Setting::getValue('contact_number', '');
        $contactEmail = \App\Models\Setting::getValue('contact_email', '');
        $whatsappNumber = \App\Models\Setting::getValue('whatsapp_number', '');
        $whatsappDefaultMessage = \App\Models\Setting::getValue('whatsapp_default_message', 'Halo, saya tertarik dengan sistem ticash');
        $officeHours = \App\Models\Setting::getValue('office_hours', '');
        $userCount = \App\Models\Setting::getValue('user_count', 0);

        return view('admin.settings', compact('contactNumber', 'contactEmail', 'whatsappNumber', 'whatsappDefaultMessage', 'officeHours', 'userCount'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'contact_number' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'whatsapp_default_message' => 'nullable|string|max:500',
            'office_hours' => 'nullable|string|max:255',
            'user_count' => 'nullable|integer|min:0',
        ]);

        \App\Models\Setting::setValue('contact_number', $request->contact_number);
        \App\Models\Setting::setValue('contact_email', $request->contact_email);
        \App\Models\Setting::setValue('whatsapp_number', $request->whatsapp_number);
        \App\Models\Setting::setValue('whatsapp_default_message', $request->whatsapp_default_message);
        \App\Models\Setting::setValue('office_hours', $request->office_hours);
        \App\Models\Setting::setValue('user_count', $request->user_count);

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully');
    }

    public function profile()
    {
        $adminId = session('admin_id');
        $admin = Admin::findOrFail($adminId);
        
        return view('admin.profile', compact('admin'));
    }

    public function updateCredentials(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_username' => 'required|string|min:3|max:255|unique:admins,username,' . session('admin_id'),
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $adminId = session('admin_id');
        $admin = Admin::findOrFail($adminId);

        // Check if current password is correct
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update username if provided
        $admin->username = $request->new_username;

        // Update password if provided
        if ($request->filled('new_password')) {
            $admin->password = Hash::make($request->new_password);
        }

        $admin->save();

        return redirect()->back()->with('success', 'Credentials updated successfully');
    }

    public function leads(Request $request)
    {
        $query = Lead::query();
        $totalLeads = Lead::count();
        
        // Search filter
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('pesantren_name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('position', 'LIKE', "%{$search}%")
                  ->orWhere('whatsapp_number', 'LIKE', "%{$search}%");
            });
        }
        
        // Status filter
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Count for results after filters
        $totalLeads = $query->count();
        
        $leads = $query->orderBy('created_at', 'desc')->get();
        
        return view('admin.leads', compact('leads', 'totalLeads'));
    }
    
    public function updateLeadStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', Lead::STATUSES)
        ]);
        
        $lead = Lead::findOrFail($id);
        $lead->status = $request->status;
        $lead->save();
        
        return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui']);
    }
}