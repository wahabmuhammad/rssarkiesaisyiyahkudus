@extends('components.layouts.public')
@section('title','Ketersediaan Kamar')

@push('head')
<style>
  /* ===== SAMA POLA DENGAN AWARDS ===== */
  .page-crumb{font-size:.95rem;color:#6b7280}
  .kamar-shell{padding-top:14px;padding-bottom:60px}

  .kamar-title{
    font-weight:600;
    font-size:clamp(1.25rem,2vw,1.75rem);
    line-height:1.25;
    margin-bottom:.25rem;
  }

  @media (max-width:575.98px){
    .kamar-title{ font-size:1.6rem; }
  }

  .room-card{
    border-radius:18px;
    background:#fff;
    border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06);
    height:100%;
    text-align:center;
    padding:24px 18px 26px;
  }

  .room-icon{
    width:72px;
    height:72px;
    margin:0 auto 12px;
    border-radius:999px;
    background:#E3F2FD;
    color:#1E88E5;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    box-shadow:0 10px 22px rgba(30,136,229,.25);
  }
</style>
@endpush

@section('content')
<div class="container">

  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item active">Ketersediaan Kamar</li>
    </ol>
  </nav>

  {{-- ===== SHELL (SAMA PERSIS DENGAN AWARDS) ===== --}}
  <div class="kamar-shell row g-4 align-items-start">

    {{-- TITLE --}}
    <div class="col-12">
      <h1 class="kamar-title">Ketersediaan Kamar</h1>
      <p class="text-muted mb-3">
        Rumah Sakit Sarkies ‘Aisyiyah Kudus
      </p>
    </div>

    {{-- GRID KAMAR --}}
    <div class="col-12">
      <div class="row g-4">

        @php
          $rooms = [
            ['name'=>'VIP A','route'=>'vip-a','url'=>url('/vip-a'),'total'=>19],
            ['name'=>'VIP B','route'=>'vip-b','url'=>url('/vip-b'),'total'=>20],
            ['name'=>'Kelas I','route'=>'kelas-1','url'=>url('/kelas-1'),'total'=>66],
            ['name'=>'Kelas II','route'=>'kelas-2','url'=>url('/kelas-2'),'total'=>80],
            ['name'=>'Kelas III','route'=>'kelas-3','url'=>url('/kelas-3'),'total'=>120],
            ['name'=>'ICU / NICU','route'=>'icu-nicu','url'=>url('/icu-nicu'),'total'=>10],
            ['name'=>'Peristi','route'=>'peristi','url'=>url('/peristi'),'total'=>8],
          ];
        @endphp

        @foreach($rooms as $r)
          @php
            $href = Route::has($r['route']) ? route($r['route']) : $r['url'];
          @endphp

          {{-- ⬇️ INI KUNCI RESPONSIVE --}}
          <div class="col-12 col-md-6 col-lg-4">
            <article class="room-card h-100">
              <div class="room-icon">
                <i class="fa-solid fa-bed"></i>
              </div>

              <h3 class="h6 fw-bold mb-1">{{ $r['name'] }}</h3>
              <div class="text-muted small mb-3">
                Total tempat tidur: {{ $r['total'] }}
              </div>

              <a href="{{ $href }}" class="btn btn-outline-primary btn-sm w-100">
                Detail Kamar
              </a>
            </article>
          </div>
        @endforeach

      </div>
    </div>

  </div>
</div>
@endsection
