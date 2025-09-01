{{-- resources/views/public/insurances.blade.php --}}
@include('public.header')

<section id="insurances" class="py-5">
  <div class="container">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb bg-transparent p-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Perusahaan Asuransi Mitra</li>
      </ol>
    </nav>

    <!-- Judul -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Perusahaan Asuransi Mitra</h2>
      <p class="text-muted mb-0">Kami bekerja sama dengan berbagai perusahaan asuransi untuk memudahkan proses layanan dan klaim.</p>
    </div>

    @php
      // Ganti/ambah sesuai mitra kamu
      $insurers = [
        ['name' => 'BPJS Kesehatan',          'logo' => asset('assets/img/asuransi/bpjs.png'),          'url' => '#'],
        ['name' => 'Prudential Indonesia',    'logo' => asset('assets/img/asuransi/prudential.png'),    'url' => '#'],
        ['name' => 'Allianz',                 'logo' => asset('assets/img/asuransi/allianz.png'),       'url' => '#'],
        ['name' => 'AXA Mandiri',             'logo' => asset('assets/img/asuransi/axa-mandiri.png'),   'url' => '#'],
        ['name' => 'Sinarmas MSIG Life',      'logo' => asset('assets/img/asuransi/sinarmas.png'),      'url' => '#'],
        ['name' => 'Manulife',                'logo' => asset('assets/img/asuransi/manulife.png'),      'url' => '#'],
      ];
    @endphp

    <!-- Grid -->
    <div class="row g-4">
      @foreach ($insurers as $i)
        <div class="col-12 col-md-6 col-lg-4">
          <article class="card h-100 shadow-sm border-0 text-center">
            <div class="ratio ratio-21x9 partner-thumb d-flex align-items-center justify-content-center">
              <img src="{{ $i['logo'] }}" alt="{{ $i['name'] }}" class="partner-logo p-4">
            </div>
            <div class="card-body">
              <h3 class="h5 mb-0">
                <a href="{{ $i['url'] }}" class="stretched-link text-decoration-none text-dark">
                  {{ $i['name'] }}
                </a>
              </h3>
            </div>
          </article>
        </div>
      @endforeach
    </div>

  </div>
</section>

<!-- Style khusus halaman ini -->
<style>
  #insurances .partner-thumb{
    background:#fff;
    border:1px solid #e9ecef;
    border-radius:1rem 1rem 0 0;
  }
  #insurances .partner-logo{
    width:100%;
    height:100%;
    object-fit:contain;
  }
  #insurances .card{ border-radius:1rem; }
  #insurances .card-body{
    border:1px solid #e9ecef; border-top:none; border-radius:0 0 1rem 1rem;
  }
</style>

@include('public.footer')
