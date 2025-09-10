@include('public.header')

<section id="poliklinik" class="py-5 bg-white">
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
          ['name'=>'Poli KIA','slug'=>'kia','icon'=>'fa-children','desc'=>'Kesehatan Ibu & Anak.'],
          ['name'=>'Poli Jiwa / Psikiatri','slug'=>'psikiatri','icon'=>'fa-face-smile','desc'=>'Konsultasi kesehatan jiwa.'],
          ['name'=>'Laboratorium','slug'=>'laboratorium','icon'=>'fa-flask','desc'=>'Pemeriksaan laboratorium.'],
          ['name'=>'Radiologi','slug'=>'radiologi','icon'=>'fa-radiation','desc'=>'Pemeriksaan radiologi & imaging.'],
          ['name'=>'USG 4D','slug'=>'usg-4d','icon'=>'fa-wave-square','desc'=>'Pemeriksaan USG 4 dimensi.'],
          ['name'=>'Apotek','slug'=>'apotek','icon'=>'fa-pills','desc'=>'Pelayanan obat & konsultasi farmasi.'],
          ['name'=>'Ruang Bersalin','slug'=>'ruang-bersalin','icon'=>'fa-baby-carriage','desc'=>'Fasilitas persalinan & perawatan ibu bayi.'],
          ['name'=>'Kamar Operasi','slug'=>'kamar-operasi','icon'=>'fa-syringe','desc'=>'Fasilitas operasi & tindakan bedah.'],
          ['name'=>'ICU / ICCU','slug'=>'icu-iccu','icon'=>'fa-heart-pulse','desc'=>'Perawatan intensif & kardiovaskular.'],
          ['name'=>'Ruang Perawatan Inap','slug'=>'rawat-inap','icon'=>'fa-bed','desc'=>'Kamar perawatan inap pasien.'],
          ['name'=>'Ambulans 24 Jam','slug'=>'ambulans','icon'=>'fa-truck-medical','desc'=>'Layanan ambulans darurat 24 jam.'],
          ['name'=>'IGD','slug'=>'igd','icon'=>'fa-hospital','desc'=>'Pelayanan medis darurat 24 jam.'],
          ['name'=>'Convention Hall','slug'=>'hall','icon'=>'fa-building','desc'=>'Tersedia convention hall atau auditorium.'],
          ['name'=>'Vaksin','slug'=>'hall','icon'=>'fa-virus','desc'=>'Tersedia berbagai macam vaksin.'],
        ];
      @endphp

      @foreach ($poli as $i => $item)
        <div class="col">
          <article class="poli-card h-100 position-relative">
            <div class="d-flex align-items-center gap-3 mb-3">
              <i class="fa-solid {{ $item['icon'] }} poli-icon" aria-hidden="true"></i>
              <h5 class="mb-0 fw-bold">{{ $item['name'] }}</h5>
            </div>
            <p class="text-muted small mb-4">{{ $item['desc'] }}</p>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>

@include('public.footer')

{{-- CSS khusus komponen + muat Font Awesome dari sini --}}
<style>
  /* muat FA6 Free langsung di halaman ini */
  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');

  /* antimenset: beberapa tema menimpa font <i>, paksa ke FA6 */
  i.fa-solid{ font-family:"Font Awesome 6 Free" !important; font-weight:900 !important; font-style:normal !important; }
  i.fa-solid::before{ display:inline-block; }

  #poliklinik .poli-card{
    padding: 24px 20px;
    border-radius: 16px;
    background: linear-gradient(180deg,#f1f7ff 0%,#f7fbff 100%);
    border: 1px solid #e7f0ff;
    box-shadow: 0 6px 20px rgba(31,93,215,.06);
    transition: transform .2s ease, box-shadow .2s ease;
  }
  #poliklinik .poli-card:hover{
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(31,93,215,.12);
  }
  #poliklinik .poli-icon{ font-size: 32px; color:#0ea5e9; }
  #poliklinik .poli-link{ font-weight:600; text-decoration:none; }
  #poliklinik .poli-link:hover{ text-decoration:underline; }
</style>
