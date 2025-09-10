@include('public.header')

<section id="awards" class="py-5">
  <div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb bg-transparent p-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Accreditations &amp; Awards</li>
      </ol>
    </nav>

    <!-- Judul -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Penghargaan</h2>
      <h5 class="text-muted">Rumah Sakit Sarkies 'Aisyiyah Kudus</h5>
    </div>

    <!-- Grid -->
    <div class="row g-4">

      <!-- Card 1 -->
      <div class="col-md-6">
        <article class="card h-100 shadow-sm border-0">
          <div class="ratio ratio-21x9 award-thumb d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/awards/emram-stage7.png') }}"
                 alt="HIMSS EMRAM Tingkat 7"
                 class="award-logo p-4">
          </div>
          <div class="card-body">
            <h3 class="h5 mb-2">
              <a href="#" class="stretched-link text-decoration-none text-dark">
                HIMSS EMRAM Tingkat 7
              </a>
            </h3>
            <p class="text-muted mb-0">
              RS Pondok Indah Group raih validasi HIMSS EMRAM Tingkat 7, menjadi yang pertama di Indonesia.
            </p>
          </div>
        </article>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6">
        <article class="card h-100 shadow-sm border-0">
          <div class="ratio ratio-21x9 award-thumb d-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/awards/newsweek-asia-pacific-2025.png') }}"
                 alt="Orthopedic Best Specialized Hospital Asia Pacific 2025"
                 class="award-logo p-4">
          </div>
          <div class="card-body">
            <h3 class="h5 mb-2">
              <a href="#" class="stretched-link text-decoration-none text-dark">
                Orthopedic Best Specialized Hospital Asia Pacific 2025
              </a>
            </h3>
            <p class="text-muted mb-0">
              Penghargaan Newsweek untuk RS Pondok Indah – Puri Indah sebagai rumah sakit spesialis ortopedi terbaik di Asia Pasifik.
            </p>
          </div>
        </article>
      </div>
    ...
  </div>
</section>

<style>
  /* css kamu tetap sama */
</style>

@include('public.footer')
