@extends('components.layouts.public')
@section('title','Penghargaan')

@push('head')
<style>
  /* ===== SAMA POLA DENGAN KANDUNGAN ===== */
  .page-crumb{font-size:.95rem;color:#6b7280}
  .awards-shell{padding-top:14px;padding-bottom:60px}

  .awards-title{
    font-weight:600;
    font-size:clamp(1.25rem,2vw,1.75rem);
    line-height:1.25;
    margin-bottom:.25rem;
  }

  @media (max-width:575.98px){
    .awards-title{ font-size:1.6rem; }
  }

  .award-card{
    border-radius:18px;
    background:#fff;
    border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06);
    height:100%;
  }

  .award-thumb{
    aspect-ratio:16/9;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#f8fafc;
    border-top-left-radius:18px;
    border-top-right-radius:18px;
  }

  .award-thumb img{
    max-width:70%;
    max-height:70%;
    object-fit:contain;
  }
</style>
@endpush

@section('content')
<div class="container">

  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Penghargaan</li>
    </ol>
  </nav>

  {{-- ===== SHELL ===== --}}
  <div class="awards-shell row g-4 align-items-start">

    {{-- A. TITLE (mobile & desktop sama aman) --}}
    <div class="col-12">
      <h1 class="awards-title">Penghargaan</h1>
      <p class="text-muted mb-3">
        Rumah Sakit Sarkies 'Aisyiyah Kudus
      </p>
    </div>

    {{-- B. GRID AWARDS --}}
    <div class="col-12">
      <div class="row g-4">

        {{-- Card 1 --}}
        <div class="col-12 col-md-6">
          <article class="award-card">
            <div class="award-thumb">
              <img src="{{ asset('assets/img/awards/emram-stage7.png') }}"
                   alt="HIMSS EMRAM Tingkat 7">
            </div>
            <div class="p-4">
              <h3 class="h6 fw-bold mb-2">
                HIMSS EMRAM Tingkat 7
              </h3>
              <p class="text-muted mb-0 small">
                RS Pondok Indah Group meraih validasi HIMSS EMRAM Tingkat 7,
                menjadi yang pertama di Indonesia.
              </p>
            </div>
          </article>
        </div>

        {{-- Card 2 --}}
        <div class="col-12 col-md-6">
          <article class="award-card">
            <div class="award-thumb">
              <img src="{{ asset('assets/img/awards/newsweek-asia-pacific-2025.png') }}"
                   alt="Orthopedic Best Specialized Hospital Asia Pacific 2025">
            </div>
            <div class="p-4">
              <h3 class="h6 fw-bold mb-2">
                Orthopedic Best Specialized Hospital Asia Pacific 2025
              </h3>
              <p class="text-muted mb-0 small">
                Penghargaan Newsweek untuk rumah sakit spesialis ortopedi
                terbaik di kawasan Asia Pasifik.
              </p>
            </div>
          </article>
        </div>

      </div>
    </div>

  </div>
</div>
@endsection
