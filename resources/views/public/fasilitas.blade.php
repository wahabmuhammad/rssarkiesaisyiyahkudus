@extends('components.layouts.public')
@section('title','Fasilitas')

@push('head')
<style>
  .page-crumb{font-size:.95rem;color:#6b7280}
  .fasilitas-shell{padding-top:14px;padding-bottom:60px}

  .fasilitas-title{
    font-weight:600;
    font-size:clamp(1.25rem,2vw,1.75rem);
    line-height:1.25;
    margin-bottom:.25rem;
  }

  @media (max-width:575.98px){
    .fasilitas-title{ font-size:1.6rem; }
  }

  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
  i.fa-solid{
    font-family:"Font Awesome 6 Free" !important;
    font-weight:900 !important;
    font-style:normal !important;
  }

  #poliklinik .poli-card{
    padding:24px 20px;
    border-radius:16px;
    background:#fff;
    border:1px solid #e7f0ff;
    box-shadow:0 6px 20px rgba(31,93,215,.06);
    transition:transform .2s ease, box-shadow .2s ease;
    height:100%;
  }

  #poliklinik .poli-card:hover{
    transform:translateY(-4px);
    box-shadow:0 12px 28px rgba(31,93,215,.12);
  }

  #poliklinik .poli-icon{
    font-size:32px;
    color:#0ea5e9;
    flex-shrink:0;
  }

  /* HILANGKAN KERTAS PUTIH HALAMAN FASILITAS */
  #poliklinik,
  #poliklinik .container {
    background: transparent !important;
  }

</style>
@endpush

@section('content')
<section id="poliklinik" class="bg-white">
  <div class="container">

    {{-- Breadcrumb --}}
    <nav class="page-crumb my-3" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
      </ol>
    </nav>

    {{-- ===== SHELL ===== --}}
    <div class="fasilitas-shell">

      {{-- TITLE --}}
      <div class="mb-4">
        <h1 class="fasilitas-title">Fasilitas</h1>
        <p class="text-muted mb-0">
          Rumah Sakit Sarkies 'Aisyiyah Kudus
        </p>
      </div>

      {{-- GRID --}}
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
        @php
          $poli = [
            ['name'=>'Poliklinik Umum','icon'=>'fa-stethoscope','desc'=>'Pelayanan kesehatan umum & konsultasi dasar.'],
            ['name'=>'Poliklinik Penyakit Dalam','icon'=>'fa-user-doctor','desc'=>'Konsultasi penyakit dalam.'],
            ['name'=>'Poliklinik Saraf','icon'=>'fa-brain','desc'=>'Neurologi & konsultasi saraf.'],
            ['name'=>'Poliklinik Kejiwaan','icon'=>'fa-face-smile','desc'=>'Konsultasi kesehatan jiwa/psikiatri.'],
            ['name'=>'Poliklinik Gigi','icon'=>'fa-tooth','desc'=>'Perawatan gigi & mulut.'],
            ['name'=>'Poliklinik Rehabilitasi','icon'=>'fa-dumbbell','desc'=>'Rehabilitasi medik & pemulihan fungsi.'],
            ['name'=>'Poliklinik Vaksin','icon'=>'fa-virus','desc'=>'Vaksinasi & imunisasi.'],
            ['name'=>'Poliklinik Jantung','icon'=>'fa-heart-pulse','desc'=>'Konsultasi dan pemeriksaan kardiologi.'],
            ['name'=>'Poliklinik Anak','icon'=>'fa-baby','desc'=>'Kesehatan anak & imunisasi.'],
            ['name'=>'Poliklinik Orthopedi','icon'=>'fa-bone','desc'=>'Tulang & sendi.'],
            ['name'=>'Poliklinik THT','icon'=>'fa-ear-listen','desc'=>'Telinga, hidung, tenggorokan.'],
            ['name'=>'Poliklinik Paru','icon'=>'fa-lungs','desc'=>'Kesehatan paru & pernapasan.'],
            ['name'=>'Poliklinik OBGYN','icon'=>'fa-person-pregnant','desc'=>'Obstetri & ginekologi.'],
            ['name'=>'Poliklinik Mata','icon'=>'fa-eye','desc'=>'Pemeriksaan & terapi mata.'],
            ['name'=>'Medical Check Up (MCU)','icon'=>'fa-notes-medical','desc'=>'Pemeriksaan kesehatan menyeluruh.'],
            ['name'=>'Laboratorium','icon'=>'fa-flask','desc'=>'Pemeriksaan laboratorium.'],
            ['name'=>'Radiologi','icon'=>'fa-radiation','desc'=>'Pemeriksaan radiologi & imaging.'],
            ['name'=>'Apotek','icon'=>'fa-pills','desc'=>'Pelayanan obat & konsultasi farmasi.'],
            ['name'=>'IGD','icon'=>'fa-hospital','desc'=>'Pelayanan medis darurat 24 jam.'],
            ['name'=>'Ambulans 24 Jam','icon'=>'fa-truck-medical','desc'=>'Layanan ambulans darurat 24 jam.'],
          ];
        @endphp

        @foreach ($poli as $item)
          <div class="col">
            <article class="poli-card">
              <div class="d-flex align-items-center gap-3 mb-3">
                <i class="fa-solid {{ $item['icon'] }} poli-icon"></i>
                <h5 class="mb-0 fw-bold">{{ $item['name'] }}</h5>
              </div>
              <p class="text-muted small mb-0">
                {{ $item['desc'] }}
              </p>
            </article>
          </div>
        @endforeach
      </div>

    </div>
  </div>
</section>
@endsection
