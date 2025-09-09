@include('public.header')

{{-- MUAT FONT AWESOME 6 LANGSUNG DI HALAMAN INI --}}
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      referrerpolicy="no-referrer" />

<section id="kamar" class="py-5 bg-white">
  <div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent p-0 mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ketersediaan Kamar</li>
      </ol>
    </nav>

    <!-- Judul -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Ketersediaan Kamar</h2>
      <h5 class="text-muted">Rumah Sakit Sarkies 'Aisyiyah Kudus</h5>
    </div>

    @php
      $updatedAt = \Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s');
      $rooms = [
        ['name'=>'VIP A','slug'=>'vip-A','total'=>19,'available'=>4],
        ['name'=>'VIP B','slug'=>'vip','total'=>20,'available'=>4],
        ['name'=>'Kelas I','slug'=>'kelas-1','total'=>66,'available'=>1],
        ['name'=>'Kelas II','slug'=>'kelas-2','total'=>80,'available'=>12],
        ['name'=>'Kelas III','slug'=>'kelas-3','total'=>120,'available'=>25],
        ['name'=>'Isolasi','slug'=>'isolasi','total'=>12,'available'=>2],
        ['name'=>'ICU','slug'=>'icu','total'=>10,'available'=>1],
        ['name'=>'NICU / PICU','slug'=>'nicu-picu','total'=>8,'available'=>3],
      ];
    @endphp

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($rooms as $r)
        <div class="col">
          <article class="room-card h-100 position-relative text-center">
            <div class="room-icon mx-auto mb-3">
              {{-- ICON FA6 --}}
              <i class="fa-solid fa-bed" aria-hidden="true"></i>
            </div>

            <h4 class="fw-bold mb-3">{{ $r['name'] }}</h4>

            <div class="d-flex justify-content-center gap-4 fw-semibold mb-2">
              <span>Tempat Tidur {{ $r['total'] }}</span>
            </div>

            <a href="{{ url('/kamar/'.$r['slug']) }}" class="stretched-link room-link mt-3 d-inline-block">Detail kamar</a>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>

@include('public.footer')

<style>
  /* ---- PAKSA FONT AWESOME 6 SOLID TIDAK KETIMPA ---- */
  i.fa-solid{
    font-family: "Font Awesome 6 Free" !important;
    font-weight: 900 !important;
    font-style: normal !important;
    line-height: 1;
  }
  i.fa-solid::before{ display:inline-block; }

  /* --- kartu tetap --- */
  #kamar .room-card{
    padding: 28px 22px;
    border-radius: 20px;
    background: linear-gradient(180deg,#f1f7ff 0%,#f7fbff 100%);
    border: 1px solid #e7f0ff;
    box-shadow: 0 10px 26px rgba(31,93,215,.08);
    transition: transform .2s ease, box-shadow .2s ease;
  }
  #kamar .room-card:hover{
    transform: translateY(-4px);
    box-shadow: 0 16px 38px rgba(31,93,215,.14);
  }

  /* --- IKON: diperkecil & biru #1E88E5 --- */
  #kamar .room-icon{
    width: 84px; height: 84px; border-radius: 999px;
    display:flex; align-items:center; justify-content:center;
    background:#E3F2FD; color:#1E88E5; font-size: 34px;
    box-shadow: 0 12px 24px rgba(30,136,229,.22);
  }

  /* seragamkan warna biru komponen lain */
  #kamar .room-link{ color:#1E88E5; font-weight:600; text-decoration:none; }
  #kamar .room-link:hover{ text-decoration:underline; }

  @media (max-width: 575.98px){
    #kamar .room-icon{ width:72px; height:72px; font-size:28px; }
  }
</style>
