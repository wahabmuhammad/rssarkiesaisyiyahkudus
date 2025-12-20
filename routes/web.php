<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\indexController as ControllersIndexController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\indexController::class, 'index'])->name('home');

Route::get('/contact', [App\Http\Controllers\indexController::class, 'contact'])->name('contact'); 

Route::get('/cari-dokter', [App\Http\Controllers\indexController::class, 'cari-dokter'])->name('cari-dokter');

Route::get('/karir', [App\Http\Controllers\indexController::class, 'karir'])->name('karir');

Route::get('/jadwal-dokter', [App\Http\Controllers\indexController::class, 'jadwalDokter'])->name('jadwal-dokter');

Route::get('/pain-center', [App\Http\Controllers\indexController::class, 'painCenter'])->name('pain-center');

Route::get('/orthopedic-center', [App\Http\Controllers\indexController::class, 'orthopedicCenter'])->name('orthopedic-center');

Route::get('/klinik-kandungan', [App\Http\Controllers\indexController::class, 'klinikKandungan'])->name('klinik-kandungan');

Route::get('/diagnostic-center', [App\Http\Controllers\indexController::class, 'diagnosticCenter'])->name('diagnostic-center');

Route::get('/intensive-care', [App\Http\Controllers\indexController::class, 'intensiveCare'])->name('intensive-care');

Route::get('/rawat-inap', [App\Http\Controllers\indexController::class, 'rawatInap'])->name('rawat-inap');

Route::get('/rehabilitasi', [App\Http\Controllers\indexController::class, 'rehabilitasi'])->name('rehabilitasi');

Route::get('/farmasi', [App\Http\Controllers\indexController::class, 'farmasi'])->name('farmasi');

Route::get('/emergency', [App\Http\Controllers\indexController::class, 'emergency'])->name('emergency');

Route::get('/fasilitas', [App\Http\Controllers\indexController::class, 'fasilitas'])->name('fasilitas');

Route::get('/kamar', [App\Http\Controllers\indexController::class, 'kamar'])->name('kamar');

Route::get('/auth-modal', [App\Http\Controllers\indexController::class, 'authModal'])->name('auth-modal');

// Route::post('/login',    [IndexController::class, 'authLogin'])->name('login');
// Route::post('/register', [IndexController::class, 'authRegister'])->name('register');
// Route::post('/logout',   [IndexController::class, 'logout'])->name('logout');

Route::view('/register', 'auth.register')->name('register.page'); // halaman form register (GET)

Route::view('vip-a', 'ranap.vip-a')->name('vip-a');

Route::view('awards', 'public.awards')->name('awards');

Route::view('asuransi', 'public.asuransi')->name('asuransi');

Route::view('dashboard', 'admin.dashboard')->name('dashboard');

// // ========== Landing ==========
// Route::get('/', fn () => redirect()->route('auth.modal'));

// Login page (guest only)
Route::view('/auth-modal', 'auth.auth-modal')->middleware('guest')->name('auth-modal');


// ========== DEV LOGIN (tanpa controller) ==========
Route::post('/login', function (Request $request) {
    $email    = $request->input('email');
    $password = $request->input('password');

    if ($email === 'superadmin@gmail.com' && $password === 'admin12345') {
        $request->session()->put([
            'dev_logged_in' => true,
            'dev_name' => 'Super Admin',
            'dev_role' => 'superadmin',
        ]);
        return redirect()->route('admin.dashboard');
    }
    return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->withInput();
})->name('login.perform');

Route::post('/logout', function (Request $request) {
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('auth.modal');
})->name('logout');

// ========== Dashboard ==========
Route::get('/admin', fn () => redirect()->route('admin.dashboard'));
Route::get('/admin/dashboard', function () {
    if (!session('dev_logged_in')) {
        return redirect()->route('auth.modal');
    }
    return view('admin.dashboard'); // pastikan file ini ada
})->name('admin.dashboard');

// ===== Admin area (placeholder routes agar link di dashboard tidak error) =====
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard (pakai punyamu yang sudah jalan; kalau belum ada, aktifkan baris ini)
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::get('/', fn () => redirect()->route('admin.dashboard'));

    // ===== Dokter (pakai view baru) =====
    Route::view('/doctors', 'admin.doctors.index')->name('doctors.index');               // LIST
    Route::view('/doctors/create', 'admin.doctors.form', ['mode' => 'create'])
        ->name('doctors.create');                                                        // CREATE
    Route::get('/doctors/{id}/edit', function ($id) {                                    // EDIT (demo)
        $doctor = [
            'id'=>$id,'nama'=>'dr. A. Setiawan','gelar'=>'Sp.PD','npa'=>'SIP-123456',
            'spesialis'=>'Penyakit Dalam','subspesialis'=>'Geriatri',
            'departemen'=>['Penyakit Dalam','Geriatri'],'pengalaman'=>12,
            'bahasa'=>['Indonesia','Inggris'],'foto'=>'','bio'=>'',
            'video'=>'','urutan'=>1,'status'=>'publish',
            'slug'=>'dr-a-setiawan-sp-pd','meta_title'=>'dr. A. Setiawan, Sp.PD',
            'meta_desc'=>'Profil singkat dr. A. Setiawan, Sp.PD','centers'=>['Diabetes Center']
        ];
        return view('admin.doctors.form', ['mode'=>'edit','doctor'=>$doctor]);
    })->name('doctors.edit');

    // ===== Departemen / Poli =====
    Route::view('/departments', 'admin.departments.index')->name('departments.index');           // LIST
    Route::view('/departments/create', 'admin.departments.form', ['mode' => 'create'])
        ->name('departments.create');                                                            // CREATE
    Route::get('/departments/{id}/edit', function ($id) {                                        // EDIT (demo)
        $dept = [
            'id'=>$id,'nama'=>'Poli Penyakit Dalam','ikon'=>'bi-heart-pulse',
            'deskripsi'=>'Layanan penyakit dalam komprehensif.','gedung'=>'Gedung A',
            'lantai'=>'Lantai 2','urutan'=>2,'status'=>'publish',
        ];
        return view('admin.departments.form', ['mode'=>'edit','dept'=>$dept]);
    })->name('departments.edit');


    // ====== JADWAL ======
    Route::view('/schedules', 'admin.schedules.index')->name('schedules.index');

    // biar tombol "Tambah Jadwal" tetap hidup, arahkan ke halaman yang sama tapi buka modal
    Route::get('/schedules/create', function () {
        return redirect()->route('admin.schedules.index', ['open' => 'create']);
    })->name('schedules.create');

    // Artikel/Berita
    // LIST
    Route::view('/articles', 'admin.articles.index')->name('articles.index');

    // CREATE
    Route::view('/articles/create', 'admin.articles.form', ['mode' => 'create'])
        ->name('articles.create');

    // EDIT (demo: isi form terisi data contoh)
    Route::get('/articles/{id}/edit', function ($id) {
        $article = [
            'id' => $id,
            'title' => 'Tips Sehat Jelang Musim Hujan',
            'slug' => 'tips-sehat-musim-hujan',
            'category' => 'Kesehatan',
            'tags' => ['tips','imun'],
            'author' => 'Humas RS',
            'publish_at' => now()->addDays(2)->format('Y-m-d\TH:i'),
            'excerpt' => 'Beberapa langkah mudah untuk menjaga daya tahan tubuh…',
            'cover' => '',
            'content' => '<p>Konten artikel contoh…</p>',
            'related' => [2,3],
            'auto_related' => false,
            'pinned' => true,
            'featured' => true,
            'show_on_home' => true,
            'status' => 'scheduled', // draft|scheduled|published
        ];
        return view('admin.articles.form', ['mode' => 'edit', 'article' => $article]);
    })->name('articles.edit');

    // ===== Hero/Banner & Popup Dokter =====
    Route::view('/hero', 'admin.hero.index')->name('hero.index');
    Route::view('/hero/create', 'admin.hero.form', ['mode' => 'create'])
        ->name('hero.create');

    // EDIT (demo isi)
    Route::get('/hero/{id}/edit', function ($id) {
        $slide = [
            'id' => $id,
            'title' => 'Promo MCU September',
            'desc' => 'Diskon Medical Checkup hingga 20% sepanjang September.',
            'cta_text' => 'Daftar Sekarang',
            'cta_link' => 'https://example.com/mcu',
            'order' => 2,
            'status' => 'publish', // draft|publish
            'start_at' => now()->startOfMonth()->format('Y-m-d'),
            'end_at'   => now()->endOfMonth()->format('Y-m-d'),
            'image' => 'https://picsum.photos/seed/hero1/800/360',
        ];
        return view('admin.hero.form', ['mode'=>'edit','slide'=>$slide]);
    })->name('hero.edit');
    
    // ==== PROMO (tanpa controller) ====
        // list
        Route::view('/promos', 'admin.promos.index')->name('promos.index');

        // create
        Route::view('/promos/create', 'admin.promos.form', ['mode' => 'create'])
            ->name('promos.create');

        // edit (dummy data supaya halaman tampil)
        Route::get('/promos/{id}/edit', function ($id) {
            $promo = [
                'id'        => $id,
                'title'     => 'Promo Diskon Medical Check Up 20%',
                'banner'    => asset('assets/img/sample/promo.jpg'), // ganti sesuai asetmu
                'desc_html' => '<p>Nikmati diskon 20% untuk paket MCU selama bulan ini. Berlaku hingga 30 September.</p>',
            ];
            return view('admin.promos.form', ['mode' => 'edit', 'promo' => $promo]);
        })->name('promos.edit');

    // ===== Center of Excellence / Layanan =====
    Route::view('/centers', 'admin.centers.index')->name('centers.index');             // LIST
    Route::view('/centers/create', 'admin.centers.form', ['mode' => 'create'])
        ->name('centers.create');                                                      // CREATE

    // EDIT (demo: isi form terisi data contoh)
    Route::get('/centers/{id}/edit', function ($id) {
        $center = [
            'id'        => $id,
            'name'      => 'Diabetes Center',
            'icon'      => 'bi-activity',                 // class Bootstrap Icon (opsional)
            'image'     => 'https://picsum.photos/seed/center/600/300', // opsional
            'desc'      => 'Klinik terpadu untuk manajemen diabetes.',
            'doctor_ids'=> [1,3],
            'departments'=> ['Penyakit Dalam'],
            'cta_text'  => 'Buat Janji',
            'cta_link'  => '#',
            'order'     => 2,
        ];
        return view('admin.centers.form', ['mode'=>'edit','center'=>$center]);
    })->name('centers.edit');

    // ===== Penghargaan & Akreditasi =====
    Route::view('/awards', 'admin.awards.index')->name('awards.index');                    // LIST
    Route::view('/awards/create', 'admin.awards.form', ['mode' => 'create'])
        ->name('awards.create');                                                           // CREATE
    Route::get('/awards/{id}/edit', function ($id) {                                       // EDIT (demo seed)
        $award = [
            'id'    => $id,
            'name'  => 'Akreditasi Paripurna KARS',
            'year'  => 2024,
            'org'   => 'KARS',
            'logo'  => 'https://picsum.photos/seed/kars/160/100', // contoh
            'cert'  => 'https://example.com/kars-paripurna.pdf',
            'order' => 1,
            'status'=> 'publish', // draft|publish
        ];
        return view('admin.awards.form', ['mode'=>'edit', 'award'=>$award]);
    })->name('awards.edit');

    // ===== Mitra Asuransi =====
    Route::view('/insurers', 'admin.insurers.index')->name('insurers.index');                 // LIST
    Route::view('/insurers/create', 'admin.insurers.form', ['mode' => 'create'])
        ->name('insurers.create');                                                            // CREATE
    Route::get('/insurers/{id}/edit', function ($id) {                                        // EDIT (demo)
        $ins = [
            'id'=>$id,'name'=>'BPJS Kesehatan','group'=>'BPJS','logo'=>'https://picsum.photos/seed/bpjs/200/120',
            'url'=>'https://www.bpjs-kesehatan.go.id','contact'=>'1500400','status'=>'aktif','order'=>1,
        ];
        return view('admin.insurers.form', ['mode'=>'edit','insurer'=>$ins]);
    })->name('insurers.edit');

    // ===== FAQ =====
    Route::view('/faq', 'admin.faq.index')->name('faq.index');                   // LIST
    Route::view('/faq/create', 'admin.faq.form', ['mode' => 'create'])
        ->name('faq.create');                                                    // CREATE
    Route::get('/faq/{id}/edit', function ($id) {                                // EDIT (demo)
        $faq = [
            'id' => $id,
            'category' => 'Pendaftaran',
            'question' => 'Bagaimana cara mendaftar berobat?',
            'answer' => '<p>Anda dapat mendaftar melalui loket pendaftaran atau WhatsApp resmi RS.</p>',
        ];
        return view('admin.faq.form', ['mode' => 'edit', 'faq' => $faq]);
    })->name('faq.edit');

    // ===== CARIER (Karir) =====
    Route::view('/carier', 'admin.carier.index')->name('carier.index');
    Route::view('/carier/create', 'admin.carier.form', ['mode' => 'create'])->name('carier.create');
    Route::get('/carier/{id}/edit', function ($id) {
        $job = [
            'id'=>$id,'title'=>'Perawat Umum','dept'=>'Perawat','status'=>'publish',
            'deadline'=>now()->addDays(10)->format('Y-m-d'),
            'desc_html'=>'<p>Memberikan pelayanan keperawatan…</p>',
            'req_html'=>'<ul><li>D3 Keperawatan</li><li>STR aktif</li></ul>',
        ];
        return view('admin.carier.form', ['mode'=>'edit','job'=>$job]);
    })->name('carier.edit');

    // Pengaturan
    Route::view('/settings/general', 'admin.settings.index')->name('settings.index');

    //route untuk login 
    // Route::post('/login', [IndexController::class, 'authLogin'])->name('login');

});
// ===== Presensi Meeting =====
Route::get('/presensi-meeting', [IndexController::class, 'presensiMetting'])->name('presensiMeeting');
Route::get('/meeting/search', [IndexController::class, 'getMeetingSuggestions']);
Route::post('/presensi-meeting/submit', [IndexController::class, 'submitPresensiMeeting'])->name('presensiMeeting.submit');