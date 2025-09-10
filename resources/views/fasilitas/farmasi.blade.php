{{-- resources/views/fasilitas/farmasi.blade.php --}}

@php
  $aboutHtml = '<p class="text-muted">
    Layanan konseling oleh <strong>Apoteker</strong> membantu Anda memahami cara pakai obat yang benar,
    aman, dan sesuai kondisi kesehatan (anak, lansia, hamil/menyusui, penyakit tertentu).
  </p>';

  $facilities = [
    'Tujuan terapi & cara kerja obat',
    'Dosis, cara pakai, waktu minum, dan lama terapi',
    'Efek samping yang mungkin terjadi & tindak lanjut',
    'Interaksi obat–suplemen–herbal',
    'Penyimpanan obat yang benar',
    'Panduan penggunaan alat (inhaler, insulin pen, dll.)',
  ];

  $spec = [
    ['Kapan Sebaiknya Konsultasi?',
      'Resep baru/perubahan regimen; minum banyak obat (polifarmasi); penyakit kronis; ' .
      'hamil/menyusui/merencanakan kehamilan; menggunakan suplemen/herbal bersamaan'],
    ['Jam Layanan','Senin–Jumat 08.00–20.00; Sabtu–Minggu/Libur 08.00–14.00'],
    ['Lokasi','Loket Farmasi / Ruang Konseling'],
    ['Catatan','Jadwal dapat berubah – konfirmasi di loket Farmasi'],
    ['Disclaimer','Layanan ini tidak menggantikan diagnosis dokter. Untuk gawat darurat, segera menuju IGD.'],
  ];

  $gallery = [
    ['src'=>asset('assets/img/farmasi/farmasi-1.jpg'),'alt'=>'Ruang konseling farmasi'],
    ['src'=>asset('assets/img/farmasi/farmasi-2.jpg'),'alt'=>'Edukasi teknik penggunaan inhaler'],
    ['src'=>asset('assets/img/farmasi/farmasi-3.jpg'),'alt'=>'Pelayanan obat di loket farmasi'],
  ];
@endphp

<x-layouts.app :title="'Konsultasi Penggunaan Obat – Farmasi'">
  <x-layouts.detail
    title="Konsultasi Penggunaan Obat – Farmasi"
    subtitle="Edukasi langsung oleh Apoteker untuk penggunaan obat yang aman & tepat."
    hero="{{ asset('assets/img/farmasi/farmasi-hero.jpg') }}"

    aboutTitle="Tentang Layanan Konseling Farmasi"
    :about="$aboutHtml"
    :facilities="$facilities"
    :spec="$spec"
    :gallery="$gallery"
  >
    {{-- ===== Slot tambahan (opsional) ===== --}}

    {{-- Breadcrumb (opsional) --}}
    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb bg-transparent p-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Farmasi</li>
      </ol>
    </nav>

    {{-- Apa yang perlu dibawa --}}
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <h3 class="h5 mb-3">Apa yang Perlu Dibawa</h3>
        <ul class="mb-0">
          <li>Resep terbaru / daftar semua obat yang sedang diminum</li>
          <li>Catatan alergi obat (jika ada)</li>
          <li>Hasil laboratorium terbaru yang relevan (jika ada)</li>
          <li>Alat yang digunakan (inhaler, insulin pen, dsb.) untuk dievaluasi tekniknya</li>
        </ul>
      </div>
    </div>

    {{-- Alur layanan singkat --}}
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <h3 class="h5 mb-3">Alur Layanan Singkat</h3>
        <ol class="mb-0">
          <li>Daftar di loket Farmasi / ruang konseling</li>
          <li>Tunggu panggilan Apoteker</li>
          <li>Sesi konseling ±10–15 menit (dapat lebih sesuai kebutuhan)</li>
          <li>Menerima ringkasan anjuran penggunaan obat</li>
        </ol>
      </div>
    </div>
  </x-layouts.detail>
</x-layouts.app>
