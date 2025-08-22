@include('public.header')

<section id="poliklinik" class="py-5 bg-white" style="margin-top:60px;">
  <div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent p-0 mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
      </ol>
    </nav>

    <!-- Judul -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Fasilitas</h2>
      <h5 class="text-muted">Rumah Sakit Sarkies 'Aisyiyah Kudus</h5>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
      @php
        $poli = [
          ['name'=>'Poli MCU','slug'=>'mcu','icon'=>'fa-stethoscope','desc'=>'Medical check-up & skrining kesehatan.'],
          ['name'=>'Poli Jantung','slug'=>'jantung','icon'=>'fa-heart-pulse','desc'=>'Konsultasi dan pemeriksaan kardiologi.'],
          ['name'=>'Poli Tindakan','slug'=>'tindakan','icon'=>'fa-briefcase-medical','desc'=>'Tindakan minor & perawatan.'],
          ['name'=>'Poli Gigi','slug'=>'gigi','icon'=>'fa-tooth','desc'=>'Perawatan gigi & mulut.'],
          ['name'=>'Poli Penyakit Dalam','slug'=>'penyakit-dalam','icon'=>'fa-user-doctor','desc'=>'Konsultasi penyakit dalam.'],
          ['name'=>'Poli THT','slug'=>'tht','icon'=>'fa-ear-listen','desc'=>'Telinga, Hidung, Tenggorokan.'],
          ['name'=>'Poli Bedah','slug'=>'bedah','icon'=>'fa-scissors','desc'=>'Konsultasi bedah umum.'],
          ['name'=>'Poli Saraf','slug'=>'saraf','icon'=>'fa-brain','desc'=>'Neurologi & konsultasi saraf.'],
          ['name'=>'Poli Orthopedi','slug'=>'orthopedi','icon'=>'fa-bone','desc'=>'Tulang & sendi.'],
          ['name'=>'Poli Mata','slug'=>'mata','icon'=>'fa-eye','desc'=>'Pemeriksaan & terapi mata.'],
          ['name'=>'Poli Kandungan','slug'=>'kandungan','icon'=>'fa-person-pregnant','desc'=>'Obstetri & ginekologi.'],
          ['name'=>'Poli Anak','slug'=>'anak','icon'=>'fa-baby','desc'=>'Kesehatan anak & imunisasi.'],
          ['name'=>'Poli KIA','slug'=>'kia','icon'=>'fa-hand-holding-heart','desc'=>'Kesehatan Ibu & Anak.'],
          ['name'=>'Poli Jiwa / Psikiatri','slug'=>'psikiatri','icon'=>'fa-face-smile','desc'=>'Konsultasi kesehatan jiwa.'],
          ['name'=>'Laboratorium','slug'=>'laboratorium','icon'=>'fa-flask','desc'=>'Pemeriksaan laboratorium.'],
        ];
      @endphp

      @foreach ($poli as $item)
        <div class="col">
          <article class="poli-card h-100 position-relative">
            <div class="d-flex align-items-center gap-3 mb-3">
              <i class="fa-solid {{ $item['icon'] }} poli-icon"></i>
              <h5 class="mb-0 fw-bold">{{ $item['name'] }}</h5>
            </div>
            <p class="text-muted small mb-4">{{ $item['desc'] }}</p>
            <a href="{{ url('/poli/'.$item['slug']) }}" class="stretched-link poli-link">Lihat detail</a>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>

@include('public.footer')

#poliklinik .poli-card{
    position: relative;
    padding: 24px 20px;
    border-radius: 16px;
    background: linear-gradient(180deg, #f1f7ff 0%, #f7fbff 100%);
    border: 1px solid #e7f0ff;
    box-shadow: 0 6px 20px rgba(31,93,215,.06);
    transition: transform .2s ease, box-shadow .2s ease;
  }
  #poliklinik .poli-card:hover{
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(31,93,215,.12);
  }
  #poliklinik .poli-step{
    position: absolute;
    top: -14px; left: 16px;
    width: 44px; height: 44px;
    border-radius: 999px;
    background: #3b82f6;
    color: #fff;
    font-weight: 700; font-size: 14px;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 10px 18px rgba(59,130,246,.35);
  }
  #poliklinik .poli-icon{ font-size: 32px; color: #0ea5e9; }
  #poliklinik .poli-link{ font-weight: 600; text-decoration: none; }
  #poliklinik .poli-link:hover{ text-decoration: underline; }


