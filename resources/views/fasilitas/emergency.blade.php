{{-- resources/views/fasilitas/emergency.blade.php --}}

@php
  // Ubah sesuai nomor IGD/Ambulans yang benar
  $ambulanceNumber = '0858-1415-0000';
@endphp

<x-layouts.app :title="'Emergency'">
  <main id="main">
    <section class="inner-page">
      <div class="container">

        <!-- Judul + Ringkasan IGD -->
        <div class="row align-items-center g-4 mb-5">
          <div class="col-lg-6">
            <h1 class="mb-3">Instalasi Gawat Darurat (IGD)</h1>
            <p class="text-muted">
              IGD melayani <strong>24 jam</strong> dengan tim dokter dan perawat terlatih
              untuk penanganan kegawatdaruratan: kecelakaan, serangan jantung &amp; stroke,
              trauma, dan kondisi kritis lainnya.
            </p>
            <ul class="mb-0">
              <li>Respon cepat &amp; sistem triase terstandar</li>
              <li>Ruang observasi &amp; tindakan lengkap</li>
              <li>Terhubung ke Radiologi, ICU, dan Laboratorium 24/7</li>
            </ul>
          </div>
          <div class="col-lg-6">
            <figure class="card shadow-sm overflow-hidden mb-0">
              <img src="{{ asset('assets/img/igd/cover-igd.jpg') }}" class="img-fluid" alt="Tampilan depan IGD">
            </figure>
          </div>
        </div>

        <!-- Galeri IGD: kamar, triase, belakang -->
        <h3 class="mb-3">Galeri IGD</h3>
        <div class="row g-4 mb-5">
          <div class="col-md-4">
            <figure class="card h-100 shadow-sm overflow-hidden">
              <img src="{{ asset('assets/img/igd/kamar-1.jpg') }}" class="img-fluid" alt="Ruang Observasi/Kamar IGD">
              <figcaption class="p-3 small text-muted">Kamar/ruang observasi pasien IGD</figcaption>
            </figure>
          </div>
          <div class="col-md-4">
            <figure class="card h-100 shadow-sm overflow-hidden">
              <img src="{{ asset('assets/img/igd/triase.jpg') }}" class="img-fluid" alt="Area Triase IGD">
              <figcaption class="p-3 small text-muted">Area triase untuk penentuan prioritas</figcaption>
            </figure>
          </div>
          <div class="col-md-4">
            <figure class="card h-100 shadow-sm overflow-hidden">
              <img src="{{ asset('assets/img/igd/belakang.jpg') }}" class="img-fluid" alt="Area belakang/akses ambulans IGD">
              <figcaption class="p-3 small text-muted">Bagian belakang IGD / akses ambulans</figcaption>
            </figure>
          </div>
        </div>

        <!-- Ambulans & Nomor Darurat (teks saja, bisa di-copy) -->
        <div class="row align-items-center g-4">
          <div class="col-lg-6">
            <figure class="card shadow-sm overflow-hidden mb-0">
              <img src="{{ asset('assets/img/igd/ambulance.jpg') }}" class="img-fluid" alt="Ambulans Rumah Sakit">
            </figure>
          </div>
          <div class="col-lg-6">
            <div class="p-4 p-lg-5 bg-light rounded-4 border">
              <div class="text-uppercase small fw-bold text-secondary mb-2">Nomor Ambulans / IGD 24 Jam</div>
              <!-- NOMOR BESAR: Teks biasa, tidak pakai <a href="tel:..."> -->
              <div class="display-5 fw-bold text-dark copyable" aria-label="Nomor Ambulans">
                {{ $ambulanceNumber }}
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </main>

  <style>
    /* bantu copy nomor cepat */
    .copyable { user-select: all; }
    /* rapikan gambar kartu */
    .card img { display:block; width:100%; height:auto; }
  </style>
</x-layouts.app>
