<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan landing page dengan data testimoni.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        $contactNumber = \App\Models\Setting::getValue('contact_number', '');
        $contactEmail = \App\Models\Setting::getValue('contact_email', '');
        $whatsappNumber = \App\Models\Setting::getValue('whatsapp_number', '');
        $whatsappDefaultMessage = \App\Models\Setting::getValue('whatsapp_default_message', 'Halo, saya tertarik dengan sistem ticash');
        $officeHours = \App\Models\Setting::getValue('office_hours', '');
        $userCount = \App\Models\Setting::getValue('user_count', 0);

        return view('landing.index', compact('testimonials', 'contactNumber', 'contactEmail', 'whatsappNumber', 'whatsappDefaultMessage', 'officeHours', 'userCount'));
    }

    /**
     * Menyimpan data lead dari formulir kontak.
     */
    public function storeContact(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'pesantren_name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'whatsapp_number' => 'required|string|max:20|min:10',
            'email' => 'nullable|email|max:255',
        ]);

        // 2. Simpan ke Database
        Lead::create($validated);

        // 3. (Opsional) Kirim Notifikasi Email ke Tim Sales

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->route('landing.index')
                         ->with('success', 'Terima kasih! Tim kami akan segera menghubungi Anda.');
    }
}
