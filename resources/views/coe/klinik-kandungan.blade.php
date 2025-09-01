@include('public.header')

<main id="main">
  <section class="inner-page">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mb-3">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Center of Excellence</a></li>
          <li class="breadcrumb-item active" aria-current="page">Klinik Kandungan dan Kebidanan</li>
        </ol>
      </nav>

      <h1 class="mb-3">Klinik Kandungan & Kebidanan (VK)</h1>
      <p class="text-muted">
        Pelayanan obstetri & ginekologi terpadu, mulai pemeriksaan kehamilan, persalinan,
        perawatan ibu-bayi, hingga konseling laktasi.
      </p>

      @php
        // ====== EDIT DI SINI UNTUK ISI VK, DOKTER, DAN BIDAN ======
        $vk_fasilitas = [
          'Ruang bersalin (VK) individual & ruang observasi kala I',
          'Area triase kebidanan 24 jam',
          'Bed bersalin elektrik & peralatan tindakan',
          'Fetal monitor/CTG & USG point-of-care',
          'Inkubator/infant warmer & perlengkapan resusitasi neonatal',
          'Infus pump, syringe pump, dan oksigen sentral',
          'Ruang laktasi & edukasi nifas',
          'Akses cepat ke kamar operasi, ICU/NICU, radiologi & laboratorium',
        ];

        $galeri = [
          ['img' => 'assets/img/obgyn/vk-1.jpg', 'caption' => 'Ruang bersalin (VK)'],
          ['img' => 'assets/img/obgyn/triase.jpg', 'caption' => 'Area triase kebidanan'],
          ['img' => 'assets/img/obgyn/observasi.jpg', 'caption' => 'Ruang observasi ibu & bayi'],
        ];

        // Daftar dokter Sp.OG
        $dokterObgyn = [
          ['nama' => 'dr. Aisyah Putri, Sp.OG', 'sip' => 'SIP-001/RS', 'foto' => 'assets/img/obgyn/dr-aisyah.jpg', 'ket'=>'Spesialis Obstetri & Ginekologi'],
          ['nama' => 'dr. Bima Aditya, Sp.OG',  'sip' => 'SIP-002/RS', 'foto' => 'assets/img/obgyn/dr-bima.jpg',  'ket'=>'Spesialis Obstetri & Ginekologi'],
          ['nama' => 'dr. Citra N., Sp.OG(K)',  'sip' => 'SIP-003/RS', 'foto' => 'assets/img/obgyn/dr-citra.jpg', 'ket'=>'Konsultan (bila ada)'],
        ];

        // Daftar bidan
        $bidan = [
          ['nama' => 'Sari Wulandari, A.Md.Keb', 'foto' => 'assets/img/obgyn/bidan-sari.jpg', 'ket'=>'Bidan Koordinator'],
          ['nama' => 'Dewi Puspita, A.Md.Keb',   'foto' => 'assets/img/obgyn/bidan-dewi.jpg', 'ket'=> 'Bidan'],
          ['nama' => 'Intan Maryam, A.Md.Keb',   'foto' => 'assets/img/obgyn/bidan-intan.jpg','ket'=> 'Bidan'],
          ['nama' => 'Rina Kurnia, A.Md.Keb',    'foto' => 'assets/img/obgyn/bidan-rina.jpg', 'ket'=> 'Bidan'],
        ];
        // ===========================================================
      @endphp

      <!-- Fasilitas VK -->
      <h3 class="mt-4 mb-3">Fasilitas VK (Verloskamer)</h3>
      <ul class="mb-4">
        @foreach($vk_fasilitas as $item)
          <li>{{ $item }}</li>
        @endforeach
      </ul>

      <!-- Galeri singkat -->
      <div class="row g-4 mb-5">
        @foreach($galeri as $g)
          <div class="col-md-4">
            <figure class="gallery-card card h-100 shadow-sm overflow-hidden">
              <img src="{{ asset($g['img']) }}" class="img-fluid" alt="{{ $g['caption'] }}">
              <figcaption class="p-3 small text-muted">{{ $g['caption'] }}</figcaption>
            </figure>
          </div>
        @endforeach
      </div>

      <!-- Dokter Sp.OG -->
      <h3 class="mb-3">Dokter Spesialis Obstetri & Ginekologi</h3>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 mb-5">
        @foreach($dokterObgyn as $d)
          <div class="col">
            <article class="people-card h-100 text-center">
              <img src="{{ asset($d['foto']) }}" class="people-photo" alt="{{ $d['nama'] }}">
              <h5 class="mt-3 mb-1">{{ $d['nama'] }}</h5>
              <div class="small text-muted">{{ $d['ket'] ?? 'Spesialis Obstetri & Ginekologi' }}</div>
              @if(!empty($d['sip'])) <div class="small text-muted">SIP: {{ $d['sip'] }}</div> @endif
            </article>
          </div>
        @endforeach
      </div>

      <!-- Bidan -->
      <h3 class="mb-3">Tim Bidan</h3>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($bidan as $b)
          <div class="col">
            <article class="people-card h-100 text-center">
              <img src="{{ asset($b['foto']) }}" class="people-photo" alt="{{ $b['nama'] }}">
              <h6 class="mt-3 mb-1">{{ $b['nama'] }}</h6>
              <div class="small text-muted">{{ $b['ket'] ?? 'Bidan' }}</div>
            </article>
          </div>
        @endforeach
      </div>

    </div>
  </section>
</main>

@include('public.footer')

<style>
  .gallery-card img { display:block; width:100%; height:auto; }
  .people-card{
    padding: 20px;
    border-radius: 16px;
    background: linear-gradient(180deg,#f1f7ff 0%,#f7fbff 100%);
    border: 1px solid #e7f0ff;
    box-shadow: 0 10px 26px rgba(31,93,215,.08);
  }
  .people-photo{
    width: 92px; height: 92px; object-fit: cover;
    border-radius: 999px; display:block; margin: 0 auto;
    box-shadow: 0 8px 20px rgba(31,93,215,.15);
  }
</style>
