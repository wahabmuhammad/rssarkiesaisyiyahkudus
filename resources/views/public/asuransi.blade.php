@extends('components.layouts.public')
@section('title','Perusahaan Asuransi Mitra')

@push('head')
<style>
  /* ===== POLA AMAN (ikut COE & Awards) ===== */
  .page-crumb{font-size:.95rem;color:#6b7280}
  .insurance-shell{padding-top:14px;padding-bottom:60px}

  .insurance-title{
    font-weight:600;
    font-size:clamp(1.25rem,2vw,1.75rem);
    line-height:1.25;
    margin-bottom:.25rem;
  }

  @media (max-width:575.98px){
    .insurance-title{ font-size:1.6rem; }
  }

  .insurance-card{
    border-radius:18px;
    background:#fff;
    border:1px solid #eef2f7;
    box-shadow:0 8px 24px rgba(16,24,40,.06);
    height:100%;
  }

  .insurance-thumb{
    aspect-ratio:16/9;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#f8fafc;
    border-top-left-radius:18px;
    border-top-right-radius:18px;
  }

  .insurance-thumb img{
    max-width:70%;
    max-height:70%;
    object-fit:contain;
  }

  .insurance-name{
    font-weight:600;
    font-size:.95rem;
    text-align:center;
  }
</style>
@endpush

@section('content')
<div class="container">

  {{-- Breadcrumb --}}
  <nav class="page-crumb my-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Beranda</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Perusahaan Asuransi Mitra
      </li>
    </ol>
  </nav>

  {{-- ===== SHELL ===== --}}
  <div class="insurance-shell row g-4">

    {{-- A. TITLE --}}
    <div class="col-12">
      <h1 class="insurance-title">Perusahaan Asuransi Mitra</h1>
      <p class="text-muted mb-3">
        Kami bekerja sama dengan berbagai perusahaan asuransi untuk memudahkan proses layanan dan klaim.
      </p>
    </div>

    @php
      $insurers = [
        ['name' => 'BPJS Kesehatan',       'logo' => asset('assets/img/asuransi/bpjs.png'),        'url' => '#'],
        ['name' => 'Prudential Indonesia', 'logo' => asset('assets/img/asuransi/prudential.png'),  'url' => '#'],
        ['name' => 'Allianz',              'logo' => asset('assets/img/asuransi/allianz.png'),     'url' => '#'],
        ['name' => 'AXA Mandiri',          'logo' => asset('assets/img/asuransi/axa-mandiri.png'), 'url' => '#'],
        ['name' => 'Sinarmas MSIG Life',   'logo' => asset('assets/img/asuransi/sinarmas.png'),    'url' => '#'],
        ['name' => 'Manulife',             'logo' => asset('assets/img/asuransi/manulife.png'),   'url' => '#'],
      ];
    @endphp

    {{-- B. GRID --}}
    <div class="col-12">
      <div class="row g-4">

        @foreach ($insurers as $i)
          <div class="col-12 col-sm-6 col-lg-4">
            <article class="insurance-card">
              <div class="insurance-thumb">
                <img src="{{ $i['logo'] }}" alt="{{ $i['name'] }}">
              </div>
              <div class="p-3">
                <div class="insurance-name">
                  <a href="{{ $i['url'] }}"
                     class="stretched-link text-decoration-none text-dark">
                    {{ $i['name'] }}
                  </a>
                </div>
              </div>
            </article>
          </div>
        @endforeach

      </div>
    </div>

  </div>
</div>
@endsection
