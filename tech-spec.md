Tentu. Ini adalah _tech spec_ versi lengkap dan mendetail, menggabungkan semua elemen modern yang telah kita diskusikan, siap untuk dieksekusi oleh tim developer.

---

## 📄 Tech Spec Lengkap: Landing Page "ticash" (v2.0 - Modern)

### 1\. Ikhtisar Proyek

- **Proyek:** Halaman Pemasaran (Landing Page) "ticash".
- **Tujuan Utama:** Menghasilkan _leads_ (calon pengguna) dari kalangan pengelola pesantren dengan cara mengedukasi mereka tentang nilai, fitur, dan model bisnis "ticash" melalui _user experience_ yang modern dan meyakinkan.
- **Target Audiens:** Pengelola Keuangan (Bendahara), Pimpinan, atau Admin IT Institusi Pesantren.

### 2\. Core Technology Stack

| Kategori           | Teknologi   | Alasan Penggunaan                                                                 |
| :----------------- | :---------- | :-------------------------------------------------------------------------------- |
| **Backend**        | Laravel 11  | Framework PHP modern untuk routing, validasi, dan logika bisnis.                  |
| **Templating**     | Blade       | _Template engine_ bawaan Laravel yang kuat dan bersih.                            |
| **Styling**        | TailwindCSS | Utility-first CSS framework untuk _custom design_ yang cepat dan responsif.       |
| **Asset Bundling** | Vite        | _Build tool_ super cepat untuk kompilasi CSS & JS (bawaan Laravel 11).            |
| **Frontend JS**    | Alpine.js   | Pustaka JavaScript minimalis untuk interaktivitas dinamis langsung di dalam HTML. |
| **Ikonografi**     | Heroicons   | Set ikon SVG premium yang dirancang untuk TailwindCSS.                            |

### 3\. Palet Warna (Brand Consistency)

| Peran                   | Warna (Hex) | Variabel Tailwind (Saran) |
| :---------------------- | :---------- | :------------------------ |
| **Primary**             | `#00A9E0`   | `blue-500`                |
| **Secondary**           | `#0072BC`   | `blue-700`                |
| **Teks (Gelap)**        | `#1E293B`   | `slate-800`               |
| **Teks (Subtle)**       | `#64748B`   | `slate-500`               |
| **Background (Dasar)**  | `#FFFFFF`   | `white`                   |
| **Background (Netral)** | `#F8FAFC`   | `slate-50`                |
| **Aksen (CTA)**         | `#FCD34D`   | `yellow-400`              |
| **Sukses**              | `#10B981`   | `emerald-500`             |
| **Error**               | `#EF4444`   | `red-500`                 |

### 4\. Spesifikasi Backend (Laravel 11)

#### 4.1. Models & Migrations

**1. Model: `Lead`**

- File: `app/Models/Lead.php`
- Migrasi: `database/migrations/..._create_leads_table.php`
- **Schema:**
  ```php
  Schema::create('leads', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('pesantren_name');
      $table->string('position'); // Jabatan (Bendahara, Pimpinan, etc.)
      $table->string('whatsapp_number');
      $table->string('email')->nullable();
      $table->string('status')->default('pending'); // Added for lead management
      $table->timestamps();
  });
  ```

**2. Model: `Testimonial`**

- File: `app/Models/Testimonial.php`
- Migrasi: `database/migrations/..._create_testimonials_table.php`
- **Schema:**
  ```php
  Schema::create('testimonials', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('position'); // Misal: Bendahara
      $table->string('institution'); // Misal: Ponpes Al-Amanah
      $table->text('quote');
      $table->string('avatar_path')->nullable(); // Path ke foto
      $table->timestamps();
  });
  ```

**3. Model: `Admin`**

- File: `app/Models/Admin.php`
- Migrasi: `database/migrations/..._create_admins_table.php`
- **Schema:**
  ```php
  Schema::create('admins', function (Blueprint $table) {
      $table->id();
      $table->string('username')->unique();
      $table->string('password');
      $table->string('email')->nullable();
      $table->rememberToken();
      $table->timestamps();
  });
  ```

**4. Model: `Setting`**

- File: `app/Models/Setting.php`
- Migrasi: `database/migrations/..._create_settings_table.php`
- **Schema:**
  ```php
  Schema::create('settings', function (Blueprint $table) {
      $table->id();
      $table->string('key')->unique();
      $table->text('value');
      $table->timestamps();
  });
  ```

#### 4.2. Routes (`routes/web.php`)

```php
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;

// Menampilkan landing page utama, mengambil data testimoni
Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');

// Menerima data dari form 'Hubungi Kami'
Route::post('/kontak', [LandingPageController::class, 'storeContact'])->name('landing.kontak');

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// Protected Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('admin.testimonials.store');
    Route::delete('/testimonials/{id}', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile/update-credentials', [AdminController::class, 'updateCredentials'])->name('admin.update.credentials');
    
    // Leads routes
    Route::get('/leads', [AdminController::class, 'leads'])->name('admin.leads');
    Route::put('/leads/{id}/status', [AdminController::class, 'updateLeadStatus'])->name('admin.leads.status');

    // Logout route
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
```

#### 4.3. Controller (`app/Http/Controllers/LandingPageController.php`)

```php
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
        $officeHours = \App\Models\Setting::getValue('office_hours', '');

        return view('landing.index', compact('testimonials', 'contactNumber', 'contactEmail', 'whatsappNumber', 'officeHours'));
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
```

#### 4.4. Admin Controller (`app/Http/Controllers/AdminController.php`)

```php
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
        $officeHours = \App\Models\Setting::getValue('office_hours', '');

        return view('admin.settings', compact('contactNumber', 'contactEmail', 'whatsappNumber', 'officeHours'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'contact_number' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'office_hours' => 'nullable|string|max:255',
        ]);

        \App\Models\Setting::setValue('contact_number', $request->contact_number);
        \App\Models\Setting::setValue('contact_email', $request->contact_email);
        \App\Models\Setting::setValue('whatsapp_number', $request->whatsapp_number);
        \App\Models\Setting::setValue('office_hours', $request->office_hours);

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
}
```

### 5\. Spesifikasi Frontend (Blade & Alpine.js)

#### 5.1. File & Aset Utama

- **`resources/views/layouts/app.blade.php`:** Layout utama.
- **`resources/views/layouts/admin.blade.php`:** Layout admin yang baru.
- **`resources/views/landing/index.blade.php`:** View utama (berisi semua bagian).
- **`resources/views/admin/`:** View untuk admin panel.
- **`resources/css/app.css`:** Impor TailwindCSS.
- **`resources/js/app.js`:** Impor Alpine.js, `Alpine.start()`. Di sini juga akan diimpor plugin Alpine seperti `intersect` dan `tween`.

#### 5.2. Detail Interaktivitas per Bagian

**Bagian 01: Header**

- **Fungsi:** Transisi dari transparan ke solid saat _scroll_.
- **Alpine.js:**
  ```html
  <header
    x-data="{ atTop: true }"
    @scroll.window="atTop = (window.scrollY < 50)"
    :class="{ 'bg-transparent': atTop, 'bg-white shadow-lg': !atTop }"
    class="fixed top-0 w-full z-50 transition-all duration-300"
  ></header>
  ```

**Bagian 02: Hero Section**

- **Fungsi:** Latar belakang video _looping_ untuk _impact_ visual maksimal.
- **HTML:**
  ```html
  <div class="relative h-screen">
    <video
      autoplay
      loop
      muted
      playsinline
      class="absolute w-full h-full object-cover z-0"
    >
      <source src="/videos/ticash-hero.mp4" type="video/mp4" />
    </video>
    <div class="absolute inset-0 bg-black/50 z-10"></div>
    <div class="relative z-20 ..."></div>
  </div>
  ```

**Bagian 03: Problems (Accordion)**

- **Fungsi:** _Accordion_ yang membuka & menutup dengan animasi halus.
- **Alpine.js:** Menggunakan plugin `x-collapse`.
  ```html
  <div x-data="{ activeAccordion: 1 }">
    <div>
      <button @click="activeAccordion = (activeAccordion === 1) ? null : 1">
        Infrastruktur
      </button>
      <div x-show="activeAccordion === 1" x-collapse></div>
    </div>
  </div>
  ```

**Bagian 04: Benefits (Fade-in on Scroll)**

- **Fungsi:** 3 _card_ manfaat muncul (fade-in & slide-up) saat masuk ke layar.
- **Alpine.js:** Menggunakan plugin `x-intersect`.
  ```html
  <div
    x-data="{ shown: false }"
    x-intersect:enter="shown = true"
    :class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }"
    class="transition-all duration-500"
  >
    <h3>Efisien & Efektif</h3>
  </div>
  ```

**Bagian 05: Features (Feature-on-Scroll)**

- **Fungsi:** _Mockup smartphone_ di kiri tetap _sticky_, gambarnya berubah saat _user_ men-_scroll_ teks fitur di kanan.
- **Alpine.js:**
  ```html
  <div class="flex" x-data="{ activeFeature: 'payment' }">
    <div class="w-1/2 sticky top-20 h-screen">
      <img
        x-show="activeFeature === 'payment'"
        src="payment.png"
        x-transition:opacity
      />
      <img
        x-show="activeFeature === 'saving'"
        src="saving.png"
        x-transition:opacity
      />
      <img
        x-show="activeFeature === 'report'"
        src="report.png"
        x-transition:opacity
      />
    </div>
    <div class="w-1/2">
      <div class="h-screen" x-intersect:enter="activeFeature = 'payment'">
        Fitur Pembayaran...
      </div>
      <div class="h-screen" x-intersect:enter="activeFeature = 'saving'">
        Fitur tiSaving...
      </div>
      <div class="h-screen" x-intersect:enter="activeFeature = 'report'">
        Fitur Laporan...
      </div>
    </div>
  </div>
  ```

**Bagian 06: Pricing (Animated Counter)**

- **Fungsi:** Angka-angka biaya beranimasi menghitung naik.
- **Alpine.js:** Menggunakan plugin `x-intersect` dan `x-tween`.
  ```html
  <div
    x-data="{ displayPrice: 0, targetPrice: 350000000 }"
    x-intersect:enter="$tween(displayPrice, targetPrice, { duration: 1500, ease: 'cubic-out' })"
  >
    <h3>Investasi Sistem</h3>
    <span x-text="'Rp ' + Math.floor(displayPrice).toLocaleString('id-ID')"
      >Rp 0</span
    >
    <span class="text-sm">100% Diwakafkan</span>
  </div>
  ```

**Bagian 07: Testimonials (Slider)**

- **Fungsi:** _Slider_ testimoni yang _native_ Alpine.js (bisa di-_swipe_).
- **Ditampilkan:** Gambar avatar bisa ditampilkan jika disediakan
- **Alpine.js:**
  ```html
  <div x-data="{ activeSlide: 1, totalSlides: {{ $testimonials->count() }} }">
    <div class="overflow-hidden">
      <div
        class="flex"
        :style="{ transform: `translateX(-${(activeSlide - 1) * 100}%)` }"
        class="transition-transform duration-500 ease-in-out"
      >
        @foreach($testimonials as $testimonial)
        <div class="w-full flex-shrink-0">
          <div class="bg-white p-8 rounded-xl shadow-lg text-center">
            <div class="w-16 h-16 rounded-full bg-slate-200 mx-auto mb-4 overflow-hidden">
              @if($testimonial->avatar_path)
              <img src="{{ Storage::url($testimonial->avatar_path) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
              @else
              <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500">{{ substr($testimonial->name, 0, 1) }}</span>
              </div>
              @endif
            </div>
            <p class="text-slate-500 italic mb-4">"{{ $testimonial->quote }}"</p>
            <h4 class="font-bold text-slate-800">{{ $testimonial->name }}</h4>
            <p class="text-slate-500">{{ $testimonial->position }}, {{ $testimonial->institution }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <button
      @click="activeSlide = (activeSlide === 1) ? totalSlides : activeSlide - 1"
    >
      Prev
    </button>
    <button
      @click="activeSlide = (activeSlide === totalSlides) ? 1 : activeSlide + 1"
    >
      Next
    </button>
  </div>
  ```

**Bagian 08: Contact Form (Real-time Validation)**

- **Fungsi:** Validasi _error_ muncul langsung saat _user_ selesai mengetik (on-blur).
- **Alpine.js:** Didefinisikan di `app.js` untuk kebersihan.
  - **`app.js`:**
    ```javascript
    document.addEventListener('alpine:init', () => {
        Alpine.data('contactForm', () => ({
            formData: { name: '', pesantren_name: '', ... },
            errors: {},
            validate(field) {
                // Reset error
                delete this.errors[field];
                // Validasi
                if (!this.formData[field]) {
                    this.errors[field] = 'Kolom ini wajib diisi.';
                }
                if (field === 'whatsapp_number' && this.formData.whatsapp_number.length < 10) {
                    this.errors[field] = 'No. WhatsApp min 10 digit.';
                }
            }
        }))
    })
    ```
  - **`index.blade.php`:**
    ```html
    <form
      x-data="contactForm()"
      action="{{ route('landing.kontak') }}"
      method="POST"
    >
      @csrf
      <div>
        <label>Nama Lengkap</label>
        <input
          type="text"
          name="name"
          x-model="formData.name"
          @blur="validate('name')"
        />
        <span
          x-show="errors.name"
          x-text="errors.name"
          class="text-red-500 text-sm"
        ></span>
      </div>
      <button type="submit">Kirim Permintaan Demo</button>
    </form>
    ```

**Bagian 09: Admin Panel**

- **Fungsi:** Panel administrasi untuk mengelola testimonial dan pengaturan kontak.
- **Fitur:**
  - Login/logout aman dengan otentikasi database
  - Upload gambar avatar untuk testimonial
  - Manajemen data testimonial (tambah, hapus)
  - Pengaturan informasi kontak (nomor telepon, email, jam operasional)
  - Perubahan kredensial admin (username dan password)
  
**Bagian 10: Lead Management System**

- **Fungsi:** Sistem manajemen lead untuk melacak permintaan demo dari pengguna
- **Fitur:**
  - Empat status lead: `pending`, `process`, `approved`, `rejected`
  - Tampilan visual dengan badge warna untuk setiap status
  - Update status secara real-time tanpa refresh halaman
  - Filter berdasarkan status dan pencarian teks
  - Tampilan profesional dengan sidebar navigasi
  - Dashboard informatif dengan distribusi status leads dan grafik
  - Tombol "Kembali ke Dashboard" untuk navigasi yang mudah
  - Migrasi database untuk menambah kolom status ke tabel leads
  - Validasi status server-side untuk keamanan
  - Fungsi pencarian dan filter untuk manajemen yang lebih efisien

### 6\. Kinerja & SEO

1.  **Optimasi Aset:**
    - **Gambar:** Gunakan format **WebP**. Kompresi semua gambar.
    - **Video:** Kompresi video _hero_ agar ukuran file di bawah 5MB.
    - **Lazy Loading:** Semua gambar di luar _hero section_ menggunakan `loading="lazy"`.
2.  **SEO Teknis:**
    - **Judul:** `<title>ticash - Solusi Cashless Modern untuk Pesantren</title>`.
    - **Deskripsi:** `<meta name="description" content="Tingkatkan efisiensi, transparansi, dan profitabilitas pesantren Anda dengan sistem transaksi digital ticash. Model wakaf, rendah biaya.">`.
    - **Struktur Heading:** Gunakan `<h1>` hanya sekali di _hero_, diikuti `<h2>` untuk setiap judul bagian (Fitur, Manfaat, dll.).
3.  **Mobile-First:** Seluruh desain di `TailwindCSS` harus _mobile-first_ (tanpa prefix `sm:`), baru kemudian ditambahkan _breakpoint_ `lg:` untuk _desktop_.