{{-- resources/views/fasilitas/farmasi.blade.php --}}
@extends('components.layouts.public')
@section('title','Konsultasi Penggunaan Obat – Farmasi')

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

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}
  .coe-shell{padding-top:14px;padding-bottom:60px}

  .coe-title{
    font-weight:600; font-size:clamp(1.125rem,1.9vw,1.75rem);
    color:#000; letter-spacing:.2px; line-height:1.25; margin-bottom:.5rem;
  }
  /* Besarkan title di mobile */
  @media (max-width:575.98px){
    .coe-title{ font-size:1.65rem; }
  }

  /* Sidebar fasilitas (sama dengan halaman lain) */
  .coe-left{
    border:1px solid #e5e7eb;border-radius:16px;background:#fff;
    box-shadow:0 8px 24px rgba(16,24,40,.06)
  }
  .coe-left .list-group-item{border:0;border-bottom:1px solid #f1f5f9;padding:.75rem 1rem;color:#111827}
  .coe-left .list-group-item:last-child{border-bottom:0}
  .coe-left .list-group-item.active{background:#E9F2FF;color:#1E88E5;font-weight:700}

  /* Desktop: sejajarkan judul & sticky sidebar */
  @media (min-width: 992px){
    :root{ --align-gap: 12px; }
    .align-top{ margin-top: var(--align-gap); }
    .sticky-wrap{ position: sticky; top: 0; align-self: flex-start; }
  }

  /* Frame gambar / carousel */
  .media-frame{
    position:relative;border-radius:20px;overflow:hidden;background:#f8fafc;
    box-shadow:0 12px 40px rgba(16,24,40,.08)
  }
  .media-frame .ratio-16x9{width:100%;aspect-ratio:16/9;background:#fff}
  .media-frame img{width:100%;height:100%;object-fit:cover}

  /* Kartu putih */
  .desc-card{
    border-radius:18px;background:#fff;border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06)
  }
</style>
@endpush

@section('content')
<div class="container">
  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/fasilitas') }}">Fasilitas dan Layanan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Farmasi</li>
    </ol>
  </nav>

  {{-- ====== LAYOUT FLEKSIBEL (mobile vs desktop) ====== --}}
  <div class="coe-shell row g-4 align-items-start">

    {{-- A. TITLE + CAROUSEL (mobile: 1, desktop: kanan/atas) --}}
    <div class="col-12 col-lg-8 order-1 order-lg-2">
      <div class="align-top">
        <h1 class="coe-title">Farmasi</h1>
      </div>

      <div id="pharm-gallery" class="carousel slide media-frame mb-lg-4" data-bs-ride="false">
        <div class="carousel-inner ratio-16x9">
          @foreach($gallery as $i => $g)
            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
              <img src="{{ $g['src'] }}" alt="{{ $g['alt'] }}">
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#pharm-gallery" data-bs-slide="prev" aria-label="Sebelumnya">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#pharm-gallery" data-bs-slide="next" aria-label="Berikutnya">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>

    {{-- B. SIDEBAR FASILITAS (mobile: 2, desktop: kiri sticky) --}}
    <div class="col-12 col-lg-4 order-2 order-lg-1">
      <div class="align-top">
        <div class="sticky-wrap">
          @include('fasilitas.sidebar')
        </div>
      </div>
    </div>

    {{-- C. KONTEN (mobile: 3, desktop: kanan/bawah) --}}
    <div class="col-12 col-lg-8 order-3 order-lg-2 offset-lg-4">

      {{-- Tentang layanan --}}
      <div class="desc-card p-4 mb-4">
        <h2 class="h5 mb-3">Tentang Layanan Konseling Farmasi</h2>
        {!! $aboutHtml !!}
        <h3 class="h6 mt-3">Topik yang Dibahas</h3>
        <ul class="mb-0">
          @foreach($facilities as $f)
            <li>{{ $f }}</li>
          @endforeach
        </ul>
      </div>

      {{-- Spesifikasi layanan --}}
      <div class="desc-card p-4 mb-4">
        <h3 class="h6 mb-3">Informasi Layanan</h3>
        <table class="table table-sm mb-0">
          <tbody>
            @foreach($spec as $row)
              <tr>
                <td class="text-muted" style="width:200px">{{ $row[0] }}</td>
                <td>{{ $row[1] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Apa yang perlu dibawa --}}
      <div class="desc-card p-4 mb-4">
        <h3 class="h6 mb-3">Apa yang Perlu Dibawa</h3>
        <ul class="mb-0">
          <li>Resep terbaru / daftar semua obat yang sedang diminum</li>
          <li>Catatan alergi obat (jika ada)</li>
          <li>Hasil laboratorium terbaru yang relevan (jika ada)</li>
          <li>Alat yang digunakan (inhaler, insulin pen, dsb.) untuk dievaluasi tekniknya</li>
        </ul>
      </div>

      {{-- Alur layanan --}}
      <div class="desc-card p-4">
        <h3 class="h6 mb-3">Alur Layanan Singkat</h3>
        <ol class="mb-0">
          <li>Daftar di loket Farmasi / ruang konseling</li>
          <li>Tunggu panggilan Apoteker</li>
          <li>Sesi konseling ±10–15 menit (dapat lebih sesuai kebutuhan)</li>
          <li>Menerima ringkasan anjuran penggunaan obat</li>
        </ol>
      </div>

    </div>
  </div>
</div>
@endsection
