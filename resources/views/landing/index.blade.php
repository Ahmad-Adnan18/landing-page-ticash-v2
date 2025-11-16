@extends('layouts.app')

@section('content')

<nav class="navbar fixed-top" x-data="{ open: false }">
    <div class="w-full lg:grid lg:grid-cols-12 lg:gap-x-8">

        <div class="lg:col-start-2 lg:col-span-5 px-4 sm:px-8 lg:px-0 flex justify-between items-center">

            <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline" href="/">
                <img src="{{ asset('images/logo-ticash-white.png') }}" alt="ticash Logo" class="h-10 logo-light" />
                <img src="{{ asset('images/logo-ticash.png') }}" alt="ticash Logo" class="h-10 logo-dark" />
                <span class="logo-text">ticash</span>
            </a>

            <button @click="open = !open" class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden" type="button">
                <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
            </button>
        </div>

        <div class="navbar-collapse offcanvas-collapse lg:block lg:col-span-6" :class="{'open': open}" id="navbarsExampleDefault" x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform translate-x-0" x-transition:leave-end="transform translate-x-full" x-cloak>

            <div class="lg:flex lg:justify-end lg:items-center">
                <ul class="pl-0 mt-3 mb-2 flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                    <li>
                        <a class="nav-link page-scroll" href="#header" @click="open = false">Home</a>
                    </li>
                    <li>
                        <a class="nav-link page-scroll" href="#problems" @click="open = false">Tantangan</a>
                    </li>
                    <li>
                        <a class="nav-link page-scroll" href="#benefits" @click="open = false">Manfaat</a>
                    </li>
                    <li>
                        <a class="nav-link page-scroll" href="#features" @click="open = false">Fitur</a>
                    </li>
                    <li>
                        <a class="nav-link page-scroll" href="#testimonials" @click="open = false">Testimoni</a>
                    </li>
                    <li>
                        <a class="nav-link page-scroll" href="#form-contact" @click="open = false">Kontak</a>
                    </li>
                </ul>
                <span class="block lg:ml-3.5 mt-3 lg:mt-0">
                    <a class="no-underline" href="{{ \App\Helpers\UrlHelper::generateWhatsAppUrlStatic() }}" target="_blank">
                        <i class="fab fa-whatsapp text-xl transition-all duration-200 mr-1.5 lg:mr-4"></i>
                    </a>
                </span>
            </div>
        </div>

    </div>
</nav>
<header id="header" class="relative bg-gradient-to-r from-pink-50 via-purple-90 to-indigo-100 pt-36 pb-24 lg:pt-48 lg:pb-32 overflow-hidden">

    <div class="lg:grid lg:grid-cols-12 lg:gap-x-8">

        <div class="lg:col-start-2 lg:col-span-5 px-4 sm:px-8 lg:px-0 relative z-10">
            <div class="mb-16 lg:mb-0 lg:mt-28">
                <h1 class="text-4xl md:text-5xl font-bold mb-5 text-slate-800">Solusi Cashless Modern untuk Pesantren</h1>
                <p class="text-lg text-slate-600 mb-8">Tingkatkan efisiensi, transparansi, dan profitabilitas pesantren Anda dengan sistem transaksi digital ticash.</p>
                <a class="btn-solid-lg page-scroll" href="#benefits">
                    Pelajari Manfaat
                </a>
                <a class="btn-solid-lg secondary page-scroll" href="#contact">
                    Demo Gratis
                </a>
            </div>
        </div>

        <div class="lg:col-span-6 relative hero-lottie-container z-10">

            <div class="absolute inset-y-0 right-0 w-full z-0 bg-blue-600 rounded-l-full"></div>

            <div class="relative z-10 w-full h-full flex items-center justify-center">

                <img class="w-full h-auto" src="{{ asset('images/feature-mobile-mockup-header.png') }}" alt="Aplikasi Mobile ticash" style="max-width: 600px;" />

                {{-- <dotlottie-player ...> ... </dotlottie-player> --}}
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-40 z-5" style="background: linear-gradient(to top, #f1f9fc, rgba(241, 249, 252, 0));">
    </div>

</header>
<div class="pt-4 pb-14 text-center bg-gray-50">
    <div class="container px-4 sm:px-8 xl:px-4">
        <p class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Sistem ticash adalah solusi manajemen keuangan digital yang dirancang khusus untuk pesantren modern. Jangan ragu untuk mencoba sistem kami hari ini dan rasakan manfaatnya</p>
    </div>
</div>
<div id="problems" class="pt-12 pb-16 lg:pt-16 basic-5">
    <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
        <div class="lg:col-span-5">
            <div class="mb-16 lg:mb-0 xl:mt-16">
                <h2 class="mb-6">Tantangan Umum di Pesantren</h2>
                <ul class="list mb-7 space-y-2">
                    <li class="flex">
                        <i class="fas fa-chevron-right"></i>
                        <div>
                            <strong>Pencatatan Manual:</strong> Manajemen keuangan yang masih manual menyebabkan pembukuan tidak akurat, memakan waktu, dan rentan kesalahan.
                        </div>
                    </li>
                    <li class="flex">
                        <i class="fas fa-chevron-right"></i>
                        <div>
                            <strong>Kurangnya Transparansi:</strong> Orang tua kesulitan memantau pengeluaran anak. Sistem pelaporan terbatas menyulitkan audit.
                        </div>
                    </li>
                    <li class="flex">
                        <i class="fas fa-chevron-right"></i>
                        <div>
                            <strong>Proses Tidak Efisien:</strong> Proses pembayaran SPP, top-up, atau transaksi di kantin sering memakan waktu dan menyebabkan antrian.
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="lg:col-span-7">
            <div class="xl:ml-14">
                <img class="w-full h-auto" src="{{ asset('images/problem-icon.png') }}" alt="Aplikasi Mobile ticash" style="max-width: 500px;" />
            </div>
        </div>
    </div>
</div>
<div id="benefits" class="cards-1">
    <div class="container px-4 sm:px-8 xl:px-4">

        <div class="card">
            <div class="card-image">
                <dotlottie-wc src="https://lottie.host/ccea7eb4-1b86-44a5-8cfc-b41eb805b8a5/4scQSxzksP.lottie" style="width: 120px; height: 120px; margin-left: auto; margin-right: auto;" autoplay loop></dotlottie-wc>
            </div>
            <div class="card-body">
                <h5 class="card-title">Efisien & Efektif</h5>
                <p class="mb-4">Proses transaksi cepat tanpa antrian panjang, menghemat waktu dan meningkatkan produktivitas.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <dotlottie-wc src="https://lottie.host/55f2be7d-ed81-4a93-ab9d-3693e7da47f0/KNLfUu2FnR.lottie" style="width: 120px; height: 120px; margin-left: auto; margin-right: auto;" autoplay loop></dotlottie-wc>
            </div>
            <div class="card-body">
                <h5 class="card-title">Transparan & Akuntabel</h5>
                <p class="mb-4">Laporan keuangan yang akurat dan dapat diakses secara real-time untuk meningkatkan transparansi.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <dotlottie-wc src="https://lottie.host/f32261f3-2baf-48d8-b568-d17fa9332f60/T702yD5MpL.lottie" style="width: 120px; height: 120px; margin-left: auto; margin-right: auto;" autoplay loop></dotlottie-wc>
            </div>
            <div class="card-body">
                <h5 class="card-title">Aman & Terpercaya</h5>
                <p class="mb-4">Perlindungan data dan keamanan transaksi yang terjamin dengan teknologi modern.</p>
            </div>
        </div>
    </div>
</div>
<div id="features" class="py-24">
    <div class="container px-4 sm:px-8">

        <div class="text-center mb-16 max-w-3xl mx-auto">
            <h2 class="mb-6">Aplikasi Mobile untuk Santri & Orang Tua</h2>
            <p class="p-large">Akses mudah untuk mengecek saldo, histori transaksi, top-up, dan berbagai fitur keuangan lainnya kapan saja dan di mana saja.</p>
        </div>

        <div class="lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">

            <div class="lg:col-span-4">

                <div class="flex items-start mb-8 lg:text-right">
                    <div class="lg:order-2 flex-shrink-0 w-12 h-12 flex items-center justify-center bg-indigo-100 rounded-lg lg:ml-4 mr-4">
                        <i class="fas fa-bell text-indigo-600 text-xl"></i>
                    </div>
                    <div class="lg:order-1">
                        <h5 class="mb-1">Notifikasi Real-time</h5>
                        <p>Pemberitahuan instan untuk setiap transaksi.</p>
                    </div>
                </div>

                <div class="flex items-start mb-8 lg:text-right">
                    <div class="lg:order-2 flex-shrink-0 w-12 h-12 flex items-center justify-center bg-indigo-100 rounded-lg lg:ml-4 mr-4">
                        <i class="fas fa-wallet text-indigo-600 text-xl"></i>
                    </div>
                    <div class="lg:order-1">
                        <h5 class="mb-1">Top-up Saldo Instan</h5>
                        <p>Fitur pengisian ulang saldo langsung dari aplikasi.</p>
                    </div>
                </div>

                <div class="flex items-start mb-8 lg:text-right">
                    <div class="lg:order-2 flex-shrink-0 w-12 h-12 flex items-center justify-center bg-indigo-100 rounded-lg lg:ml-4 mr-4">
                        <i class="fas fa-chart-pie text-indigo-600 text-xl"></i>
                    </div>
                    <div class="lg:order-1">
                        <h5 class="mb-1">Laporan Lengkap</h5>
                        <p>Laporan pengeluaran harian, mingguan, dan bulanan.</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 my-12 lg:my-0">
                <img class="inline w-full h-auto mx-auto" src="{{ asset('images/feature-mobile-mockup.png') }}" alt="Aplikasi Mobile ticash" />
            </div>

            <div class="lg:col-span-4">

                <div class="flex items-start mb-8">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-indigo-100 rounded-lg mr-4">
                        <i class="fas fa-ban text-indigo-600 text-xl"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Limitasi Uang Jajan</h5>
                        <p>Atur batas pengeluaran harian untuk anak Anda.</p>
                    </div>
                </div>

                <div class="flex items-start mb-8">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-indigo-100 rounded-lg mr-4">
                        <i class="fas fa-file-invoice-dollar text-indigo-600 text-xl"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Pembayaran SPP</h5>
                        <p>Lakukan pembayaran SPP dan biaya lainnya secara digital.</p>
                    </div>
                </div>

                <div class="flex items-start mb-8">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-indigo-100 rounded-lg mr-4">
                        <i class="fas fa-coins text-indigo-600 text-xl"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Tabungan Bersama</h5>
                        <p>Fitur tabungan kolektif antara orang tua dan santri.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center mt-8">
            <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox">Selengkapnya</a>
        </div>
    </div>
</div>
<div id="details-lightbox" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-8">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="lg:col-span-8">
            <div class="mb-12 text-center lg:mb-0 lg:text-left xl:mr-6">
                <img class="inline rounded-lg" src="{{ asset('images/feature-admin-mockup.png') }}" alt="alternative" />
            </div>
        </div>
        <div class="lg:col-span-4">
            <h3 class="mb-2">Fitur Lengkap</h3>
            <hr class="w-11 h-0.5 mt-0.5 mb-4 ml-0 border-none bg-blue-600" />
            <p>Sistem kami dirancang untuk mencakup semua kebutuhan administrasi keuangan di pesantren modern.</p>
            <h4 class="mt-7 mb-2.5">Manajemen Terpusat</h4>
            <p class="mb-4">Semua data dari aplikasi mobile, kantin, dan pembayaran SPP terhubung langsung ke dashboard admin secara real-time.</p>
            <ul class="list mb-6 space-y-2">
                <li class="flex">
                    <i class="fas fa-chevron-right"></i>
                    <div>Manajemen Data Santri & Wali</div>
                </li>
                <li class="flex">
                    <i class="fas fa-chevron-right"></i>
                    <div>Manajemen Kantin & Koperasi</div>
                </li>
                <li class="flex">
                    <i class="fas fa-chevron-right"></i>
                    <div>Laporan Keuangan Otomatis</div>
                </li>
                <li class="flex">
                    <i class="fas fa-chevron-right"></i>
                    <div>Pembayaran SPP & Tagihan</div>
                </li>
                <li class="flex">
                    <i class="fas fa-chevron-right"></i>
                    <div>Integrasi Aplikasi Mobile</div>
                </li>
            </ul>
            <a class="btn-solid-reg mfp-close page-scroll" href="#contact">Demo Gratis</a>
            <button class="btn-outline-reg mfp-close as-button" type="button">Kembali</button>
        </div>
    </div>
</div>
<div class="pt-16 pb-12 basic-5">
    <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
        <div class="lg:col-span-5">
            <div class="mb-16 lg:mb-0 xl:mt-16">
                <h2 class="mb-6">Platform integrasi dan update seumur hidup gratis</h2>
                <p class="mb-4">Dapatkan gambaran tentang apa yang dapat dilakukan ticash untuk otomasi keuangan pesantren dan pahami mengapa pengguna saat ini sangat antusias saat menggunakan ticash bersama tim mereka.</p>
                <p class="mb-4">Kami akan segera menjawab pertanyaan apa pun dan menghormati permintaan Anda berdasarkan kesepakatan tingkat layanan</p>
            </div>
        </div>
        <div class="lg:col-span-7">
            <div class="ml-14">
                <dotlottie-player id="layers-animation" src="{{ asset('lottie/Layers.lottie') }}" background="transparent" speed="1" style="max-width: 500px; max-height: 500px;" loop autoplay>
                </dotlottie-player>
            </div>
        </div>
    </div>
</div>
<div class="counter bg-gradient-to-r from-blue-50 to-indigo-50 py-16">
    <div class="container px-4 sm:px-8">
        <div class="max-w-l mx-auto text-center">
            <div class="inline-block px-4 py-1.5 bg-gray-50 text-blue-900 rounded-full mb-6">
                <span class="font-bold">KOMUNITAS KAMI</span>
            </div>
            <div class="counter-value number-count text-6xl md:text-7xl lg:text-8xl font-bold bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent" data-count="{{ $userCount ?? 0 }}">
                0
            </div>
            <p class="text-2xl md:text-3xl font-bold text-slate-800 mt-4">Orang Lebih Pengguna Terdaftar</p>
            {{-- <p class="text-lg md:text-xl text-slate-600 mt-3 max-w-2xl mx-auto">Bergabunglah dengan komunitas pesantren yang telah mempercayai sistem kami</p> --}}
        </div>
    </div>
</div>
<div id="testimonials" class="slider-1 py-20 bg-gray">
    <div class="container px-4 sm:px-8">
        <h2 class="mb-12 text-center lg:max-w-xl lg:mx-auto">Apa kata mereka tentang ticash</h2>

        <div class="slider-container">
            <div class="swiper-container card-slider">
                <div class="swiper-wrapper">

                    @forelse($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="card bg-white rounded-xl shadow-lg p-6 border border-slate-200 transition-all duration-300 hover:shadow-xl">
                            <div class="flex flex-col items-center text-center mb-4">
                                <div class="testimonial-avatar mb-3">
                                    @if($testimonial->avatar_path)
                                    <img class="rounded-full object-cover w-16 h-16" src="{{ Storage::url($testimonial->avatar_path) }}" alt="{{ $testimonial->name }}" />
                                    @else
                                    <div class="w-16 h-16 rounded-full bg-slate-200 flex items-center justify-center mx-auto">
                                        <span class="font-medium text-slate-600 text-xl">{{ substr($testimonial->name, 0, 1) }}</span>
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-lg">{{ $testimonial->name }}</h4>
                                    <p class="text-slate-600">{{ $testimonial->position }}</p>
                                    <p class="text-blue-600 font-medium">{{ $testimonial->institution }}</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="italic text-slate-700 mb-4">"{{ $testimonial->quote }}"</p>
                            </div>
                        </div>
                    </div> @empty
                    <div class="swiper-slide">
                        <div class="card bg-white rounded-xl shadow-lg p-6 border border-slate-200">
                            <div class="flex flex-col items-center text-center mb-4">
                                <img class="rounded-full object-cover w-16 h-16 mb-3" src="images/testimonial-1.jpg" alt="alternative" />
                                <div>
                                    <h4 class="font-bold text-slate-800 text-lg">Contoh Pengguna</h4>
                                    <p class="text-slate-600">Bendahara</p>
                                    <p class="text-blue-600 font-medium">Ponpes Al-Amanah</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="italic text-slate-700 mb-4">"Sistem ticash sangat membantu dalam mengelola keuangan pesantren dengan lebih efisien dan transparan."</p>
                            </div>
                        </div>
                    </div> @endforelse

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<div id="investment" class="py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="container px-4 sm:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">Proyek Sosial Wakaf</h2>

                <div class="mb-8">
                    <div class="inline-flex items-center bg-blue-100 text-blue-800 px-4 py-2 rounded-full mb-4">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium">100% Diwakafkan</span>
                    </div>

                    <p class="text-slate-600 text-lg mb-6">Sistem ticash adalah proyek sosial yang didedikasikan sepenuhnya untuk kemaslahatan pesantren di seluruh Indonesia</p>

                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 mb-8 text-white max-w-2xl mx-auto">
                        <h3 class="text-xl font-bold mb-2">Nilai Investasi</h3>
                        <div class="text-4xl font-bold">Rp 350.000.000</div>
                        <p class="text-blue-100 mt-2">Telah diwakafkan untuk kemaslahatan umat</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-slate-50 p-6 rounded-lg border border-slate-200">
                        <h4 class="font-bold text-slate-800 mb-3">Apa yang Diwakafkan</h4>
                        <ul class="space-y-2 text-slate-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Full akses ke sistem</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Support dan maintenance</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Update fitur seumur hidup</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-slate-50 p-6 rounded-lg border border-slate-200">
                        <h4 class="font-bold text-slate-800 mb-3">Manfaat Wakaf</h4>
                        <ul class="space-y-2 text-slate-600">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Pesantren terbantu dalam manajemen keuangan</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Transparansi keuangan pesantren meningkat</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Operasional pesantren lebih efisien</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-200">
                    <p class="text-slate-600 max-w-2xl mx-auto">Dengan sistem ticash yang 100% diwakafkan, pesantren hanya perlu menanggung biaya operasional minimal, sedangkan nilai investasi utama telah diwakafkan untuk kemaslahatan umat.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="form-contact" class="basic-5">
    <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2">
        <div class="mb-16 lg:mb-0">
            <dotlottie-wc src="https://lottie.host/af8db9f6-4856-406f-9b6a-0805025b8343/CuGkGIddUy.lottie" class="inline w-full max-w-md" style="width: 500px;height: 500px" autoplay loop></dotlottie-wc>
        </div>
        <div class="lg:mt-12 xl:mt-24 xl:ml-12">
            <h2 class="text-3xl font-bold mb-4 text-slate-800">Tertarik dengan Solusi Kami?</h2>
            <p class="text-slate-500 mb-8">Isi formulir di bawah untuk mendapatkan demo gratis dan informasi lebih lanjut.</p>

            <form method="POST" action="{{ route('landing.kontak') }}">
                @csrf
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control-input" required>
                    <label class="label-control" for="name">Nama Lengkap</label>
                </div>
                <div class="form-group">
                    <input type="text" id="pesantren_name" name="pesantren_name" class="form-control-input" required>
                    <label class="label-control" for="pesantren_name">Nama Pesantren</label>
                </div>
                <div class="form-group">
                    <input type="text" id="position" name="position" class="form-control-input" required>
                    <label class="label-control" for="position">Jabatan</label>
                </div>
                <div class="form-group">
                    <input type="text" id="whatsapp_number" name="whatsapp_number" class="form-control-input" required>
                    <label class="label-control" for="whatsapp_number">No. WhatsApp</label>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control-input">
                    <label class="label-control" for="email">Email (Opsional)</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control-submit-button">Kirim Permintaan Demo</button>
                </div>

                @if(session('success'))
                <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
<!-- Footer BARU (Menggantikan .footer dan .copyright) -->
<div class_alias="footer" class="footer-new">
    <!-- Menggunakan kelas baru agar tidak konflik -->
    <div class="container px-4 sm:px-8">


        <!-- Divider -->
        <hr class="footer-divider" />

        <!-- Grid 3 Kolom -->
        <div class="lg:grid lg:grid-cols-3 lg:gap-x-8 mt-4">

            <!-- Brand Section -->
            <div class="brand-section">
                <div class="logo-title mb-4">
                    <!-- Logo & Title -->
                    <img src="{{ asset('images/logo-ticash-white.png') }}" alt="ticash Logo" class="h-10 mr-3" />
                    <h5 class="text-white text-2xl font-bold">ticash</h5>
                </div>
                <p class="mb-6 max-w-md">
                    Solusi manajemen keuangan digital untuk pesantren. Platform integrasi dan update seumur hidup gratis untuk kemaslahatan umat.
                </p>
                <!-- Ikon sosial (tanpa fa-stack) -->
                <div class="social-links mb-8">
                    <a href="{{ \App\Helpers\UrlHelper::generateWhatsAppUrlStatic() }}" target="_blank" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <!-- Tambahkan link sosial media Anda yang lain di sini jika ada -->

                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>

                </div>
            </div>

            <!-- Kolom 2: Hubungi Kami -->
            <div>
                <h5 class="text-white font-bold uppercase mb-4 mt-8 lg:mt-0">Hubungi Kami</h5>
                <ul class="list-unstyled contact-info">
                    {{-- @if(isset($contactNumber) && $contactNumber)
                    <li class="flex items-start">
                        <i class="fas fa-phone-alt w-4 mr-2 mt-1 flex-shrink-0"></i>
                        <span>{{ $contactNumber }}</span>
                    </li>
                    @endif --}}
                    @if(isset($whatsappNumber) && $whatsappNumber)
                    <li class="flex items-start">
                        <i class="fab fa-whatsapp w-4 mr-2 mt-1 flex-shrink-0"></i><span>{{ $whatsappNumber }}</span>

                    </li>
                    @endif
                    @if(isset($contactEmail) && $contactEmail)
                    <li class="flex items-start">
                        <i class="fas fa-envelope w-4 mr-2 mt-1 flex-shrink-0"></i>
                        <span><a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></span>
                    </li>
                    @endif
                    <!-- Anda bisa tambahkan alamat jika ada di variabel -->
                    {{--
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt w-4 mr-2 mt-1 flex-shrink-0"></i>
                        <span>Alamat kantor Anda di sini...</span>
                    </li>
                    --}}
                    @if(isset($officeHours) && $officeHours)
                    <li class="flex items-start">
                        <i class="fas fa-clock w-4 mr-2 mt-1 flex-shrink-0"></i>
                        <span class="office-hours">{{ $officeHours }}</span>
                    </li>
                    @endif
                </ul>
            </div>

            <!-- Kolom 3: WhatsApp Default Message -->
            <div>
                <h5 class="text-white font-bold uppercase mb-4 mt-8 lg:mt-0">Pesan Kami</h5>
                {{-- <p class="text-slate-300">
                    {{ $whatsappDefaultMessage ?? 'Halo, saya tertarik dengan sistem ticash' }}
                </p> --}}
                <div class="mt-4">
                    <a href="{{ \App\Helpers\UrlHelper::generateWhatsAppUrlStatic() }}" target="_blank" class="contact-btn">
                        <i class="fab fa-whatsapp"></i>Hubungi Sekarang
                    </a>
                </div>
            </div>

        </div> <!-- end grid -->

        <!-- Copyright Bar (di dalam footer) -->
        <hr class="border-gray-700 my-2" />
        <div class="text-center">
            <p class="p-small">Copyright © {{ date('Y') }} <a href="#" class="no-underline hover:text-white">ticash</a>. All rights reserved.</p>
        </div>

    </div> <!-- end container -->
</div> <!-- end footer-new -->

@endsection

@push('styles')
<style>
    .testimonial-avatar {
        margin-bottom: 1rem;
        text-align: center;
    }

    .testimonial-avatar img {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto;
        aspect-ratio: 1/1;
    }

    /* Additional testimonial styles */
    #testimonials .card {
        height: 100%;
    }

    #testimonials .testimonial-avatar img {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        object-fit: cover;
    }

</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.js"></script>
<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>

<script>
    // Counter animation
    document.addEventListener('DOMContentLoaded', function() {
        const counterElement = document.querySelector('.counter-value');
        if (counterElement) {
            const targetCount = parseInt(counterElement.getAttribute('data-count')) || 0;
            const suffix = counterElement.getAttribute('data-suffix') || ''; // Default suffix adalah +

            // Function to animate the counter
            const animateCounter = () => {
                const duration = 2000; // Animation duration in ms
                const frameDuration = 1000 / 60; // ~60fps
                let currentCount = 0;
                const increment = targetCount / (duration / frameDuration);

                const updateCount = () => {
                    currentCount += increment;
                    if (currentCount < targetCount) {
                        // Format number dengan thousand separator dan tambahkan suffix
                        counterElement.textContent = Math.floor(currentCount).toLocaleString() + suffix;
                        requestAnimationFrame(updateCount);
                    } else {
                        // Final value dengan suffix
                        counterElement.textContent = targetCount.toLocaleString() + suffix;
                    }
                };

                updateCount();
            };

            // Trigger animation when counter comes into view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter();
                        observer.unobserve(counterElement);
                    }
                });
            }, {
                threshold: 0.5
            });

            observer.observe(counterElement);
        }
    });

</script>
@endpush
