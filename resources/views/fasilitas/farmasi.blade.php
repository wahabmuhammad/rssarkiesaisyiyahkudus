@include('public.header')

<main id="main">
  <section class="inner-page">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mb-3">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Farmasi</li>
        </ol>
      </nav>

      <h1 class="mb-3">Konsultasi Penggunaan Obat – Farmasi</h1>
      <p class="text-muted mb-4">
        Layanan konseling oleh <strong>Apoteker</strong> untuk membantu Anda memahami cara pakai obat yang benar,
        aman, dan sesuai kondisi kesehatan (anak, lansia, hamil/menyusui, penyakit tertentu).
      </p>

      <!-- Apa yang didapat -->
      <div class="row g-4 mb-5">
        <div class="col-md-6">
          <div class="p-4 bg-light border rounded-3 h-100">
            <h3 class="h5 mb-3">Apa yang Akan Dibahas</h3>
            <ul class="mb-0">
              <li>Tujuan terapi &amp; <em>cara kerja</em> obat</li>
              <li>Dosis, cara pakai, waktu minum, dan lama terapi</li>
              <li>Efek samping yang mungkin terjadi &amp; apa yang harus dilakukan</li>
              <li>Interaksi obat, suplemen, dan herbal</li>
              <li>Cara penyimpanan obat yang benar</li>
              <li>Panduan penggunaan alat (mis. inhaler, insulin pen)</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-4 bg-light border rounded-3 h-100">
            <h3 class="h5 mb-3">Kapan Sebaiknya Konsultasi?</h3>
            <ul class="mb-0">
              <li>Mendapat <strong>resep baru</strong> atau perubahan regimen</li>
              <li>Mengonsumsi banyak obat sekaligus (polifarmasi)</li>
              <li>Memiliki penyakit kronis (diabetes, hipertensi, dll.)</li>
              <li>Sedang hamil/menyusui atau merencanakan kehamilan</li>
              <li>Menggunakan suplemen/herbal bersamaan dengan obat</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Apa yang perlu dibawa -->
      <div class="mb-5">
        <h3 class="h5 mb-3">Apa yang Perlu Dibawa</h3>
        <ul>
          <li>Resep terbaru / daftar semua obat yang sedang diminum</li>
          <li>Catatan alergi obat (jika ada)</li>
          <li>Hasil laboratorium terbaru yang relevan (jika ada)</li>
          <li>Alat yang digunakan (inhaler, insulin pen, dsb.) untuk dievaluasi tekniknya</li>
        </ul>
      </div>

      <!-- Alur singkat -->
      <div class="mb-5">
        <h3 class="h5 mb-3">Alur Layanan Singkat</h3>
        <ol>
          <li>Daftar di loket Farmasi / ruang konseling</li>
          <li>Tunggu panggilan Apoteker</li>
          <li>Sesi konseling ±10–15 menit (dapat lebih sesuai kebutuhan)</li>
          <li>Menerima ringkasan anjuran penggunaan obat</li>
        </ol>
      </div>

      <!-- Jadwal layanan (sesuaikan jika perlu) -->
      <div class="row g-4">
        <div class="col-md-6">
          <div class="p-4 bg-white border rounded-3 h-100">
            <h3 class="h5 mb-3">Jam Layanan Konsultasi</h3>
            <ul class="mb-0">
              <li>Senin–Jumat: 08.00 – 20.00</li>
              <li>Sabtu–Minggu/Libur: 08.00 – 14.00</li>
            </ul>
            <p class="small text-muted mt-2 mb-0">*Jadwal dapat berubah, silakan konfirmasi di loket Farmasi.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-4 bg-white border rounded-3 h-100">
            <h3 class="h5 mb-3">Catatan Penting</h3>
            <p class="mb-0">
              Layanan ini tidak menggantikan diagnosis dokter. Untuk keluhan gawat darurat,
              segera menuju IGD.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>
</main>

@include('public.footer')
