{{-- resources/views/ranap/vip-a.blade.php --}}

@include('public.header')

<main id="main" style="margin-top:60px">
  <!-- Hero Section -->
  <section class="hero text-center text-white d-flex align-items-center justify-content-center"
    style="background: url('{{ asset('assets/img/kamar-vipa.jpg') }}') center/cover no-repeat;
           min-height: 300px;
           text-shadow: 1px 1px 5px rgba(0,0,0,0.6);">
    <div>
      <h2 class="display-5 fw-bold">Kamar VIP A</h2>
      <p class="lead mb-0">Kenyamanan premium untuk pemulihan yang lebih tenang.</p>
    </div>
  </section>

  <!-- Content Section -->
  <section class="py-5">
    <div class="container">
      <h3 class="fw-bold">Tentang Kamar VIP A</h3>
      <p>
        Kamar VIP A dirancang untuk menghadirkan suasana yang tenang, privat, dan nyaman.
        Dilengkapi fasilitas lengkap untuk pasien dan keluarga agar proses perawatan lebih optimal.
      </p>

      <!-- Dua kolom seimbang: Fasilitas & Spesifikasi -->
      <div class="row g-4 mt-2 align-items-start">
        <!-- Fasilitas -->
        <div class="col-lg-6">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <h4 class="fw-bold mb-3">Fasilitas Unggulan</h4>
              <ul class="mb-0">
                <li>Tempat tidur elektrik dengan pengaturan posisi</li>
                <li>Kamar mandi dalam dengan water heater</li>
                <li>AC individual &amp; ventilasi baik</li>
                <li>TV layar datar &amp; Wi-Fi berkecepatan tinggi</li>
                <li>Sofa bed/sofa tamu untuk pendamping</li>
                <li>Kulkas mini &amp; pantry kecil</li>
                <li>Meja kerja &amp; lemari penyimpanan</li>
                <li>Nurse call system 24 jam</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Spesifikasi -->
        <div class="col-lg-6">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
              <h4 class="fw-bold mb-3">Spesifikasi Kamar</h4>
              <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                  <tbody>
                    <tr>
                      <th style="width:40%">Luas Ruangan</th>
                      <td>± 20–24 m²</td>
                    </tr>
                    <tr>
                      <th>Tipe Tempat Tidur</th>
                      <td>Elektrik, 1 pasien, matras anti-decubitus</td>
                    </tr>
                    <tr>
                      <th>Kamar Mandi</th>
                      <td>Dalam, shower &amp; water heater, perlengkapan dasar</td>
                    </tr>
                    <tr>
                      <th>Fasilitas Tamu</th>
                      <td>Sofa/sofa bed, kursi visitor, meja samping</td>
                    </tr>
                    <tr>
                      <th>Layanan Harian</th>
                      <td>Kebersihan kamar, pergantian linen, room service</td>
                    </tr>
                    <tr>
                      <th>Keamanan</th>
                      <td>Nurse call, fire alarm, akses area terkontrol</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Galeri full width di bawah -->
      <div class="mt-5">
        <h4 class="fw-bold">Galeri</h4>
        <div class="row g-3">
          <div class="col-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
              <img src="{{ asset('assets/img/vip-a-1.jpg') }}" class="card-img-top" alt="Kamar VIP A - Tampak Depan">
            </div>
          </div>
          <div class="col-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
              <img src="{{ asset('assets/img/vip-a-2.jpg') }}" class="card-img-top" alt="Kamar VIP A - Area Tamu">
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
              <img src="{{ asset('assets/img/vip-a-3.jpg') }}" class="card-img-top" alt="Kamar VIP A - Kamar Mandi">
            </div>
          </div>
        </div>
        <p class="text-muted small mt-2 mb-0">*Gambar bersifat ilustrasi, detail dapat berbeda di lokasi.</p>
      </div>

      <hr class="my-5">

      <h4 class="fw-bold">Layanan Penunjang</h4>
      <ul class="mb-0">
        <li>Visit dokter sesuai jadwal &amp; monitoring perawat 24 jam</li>
        <li>Pengantaran obat &amp; pemeriksaan penunjang (laboratorium/radiologi) sesuai indikasi</li>
        <li>Paket nutrisi pasien sesuai rekomendasi gizi</li>
      </ul>
    </div>
  </section>
</main>

@include('public.footer')
