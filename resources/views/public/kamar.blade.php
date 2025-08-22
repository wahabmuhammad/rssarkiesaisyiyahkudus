@include('public.header')

<section id="kamar" class="py-5 bg-white" style="margin-top:60px;">
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
      // Data dummy; nanti ganti dari DB
      $updatedAt = \Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s');
      $rooms = [
        ['name'=>'VIP A','slug'=>'vvip','total'=>19,'available'=>4],
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
        @php
          $occupied = max(0, $r['total'] - $r['available']);
          $percent  = $r['total'] > 0 ? round($occupied / $r['total'] * 100) : 0;
        @endphp

        <div class="col">
          <article class="room-card h-100 position-relative text-center">
            <div class="room-icon mx-auto mb-3">
              <i class="fa-solid fa-bed"></i>
            </div>

            <h4 class="fw-bold mb-3">{{ $r['name'] }}</h4>

            <div class="d-flex justify-content-center gap-4 fw-semibold mb-2">
              <span>Tempat Tidur {{ $r['total'] }}</span>
              <span>Kosong {{ $r['available'] }}</span>
            </div>

            <div class="text-muted small mb-3">Update {{ $updatedAt }}</div>

            <div class="mx-auto" style="max-width:240px;">
              <div class="progress" style="height:8px;">
                <div class="progress-bar bg-primary" role="progressbar"
                     style="width: {{ $percent }}%;" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex justify-content-between small mt-1 text-muted">
                <span>Terisi {{ $occupied }}</span>
                <span>{{ $percent }}%</span>
              </div>
            </div>

            <a href="{{ url('/kamar/'.$r['slug']) }}" class="stretched-link room-link mt-3 d-inline-block">Detail kamar</a>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>

@include('public.footer')

{{-- CSS komponen (gaya mirip kartu poli) --}}
<style>
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
    width: 84px;               /* dari 110px -> 84px */
    height: 84px;
    border-radius: 999px;
    display:flex; align-items:center; justify-content:center;
    background:#E3F2FD;        /* lingkaran biru muda */
    color:#1E88E5;             /* warna ikon */
    font-size: 34px;           /* dari 42px -> 34px */
    box-shadow: 0 12px 24px rgba(30,136,229,.22);
  }

  /* seragamkan warna biru komponen lain */
  #kamar .progress-bar{ background-color:#1E88E5 !important; }
  #kamar .room-link{ color:#1E88E5; font-weight:600; text-decoration:none; }
  #kamar .room-link:hover{ text-decoration:underline; }

  /* opsional: makin kecil di layar kecil */
  @media (max-width: 575.98px){
    #kamar .room-icon{ width:72px; height:72px; font-size:28px; }
  }
</style>
