{{-- resources/views/coe/klinik-kandungan.blade.php --}}

<x-layouts.app :title="'Klinik Kandungan & Kebidanan (VK)'">
  <x-layouts.detail
    title="Klinik Kandungan & Kebidanan (VK)"
    subtitle="Pelayanan obstetri & ginekologi terpadu untuk ibu dan bayi."
    hero="{{ asset('assets/img/obgyn/vk-1.jpg') }}"

    aboutTitle="Tentang Klinik Kandungan & Kebidanan"
    :about="<<<'HTML'
      <p>
        Pelayanan obstetri &amp; ginekologi terpadu, mulai pemeriksaan kehamilan, persalinan,
        perawatan ibu–bayi, hingga konseling laktasi. Tim kami bekerja kolaboratif untuk
        keamanan ibu dan bayi.
      </p>
    HTML"

    :facilities="[
      'Ruang bersalin (VK) individual & ruang observasi kala I',
      'Area triase kebidanan 24 jam',
      'Bed bersalin elektrik & peralatan tindakan',
      'Fetal monitor/CTG & USG point-of-care',
      'Inkubator/infant warmer & perlengkapan resusitasi neonatal',
      'Infus pump, syringe pump, dan oksigen sentral',
      'Ruang laktasi & edukasi nifas',
      'Akses cepat ke kamar operasi, ICU/NICU, radiologi & laboratorium',
    ]"

    :spec="[
      ['Jenis Layanan','Antenatal care, persalinan normal/tindakan, pemantauan ibu & bayi, konseling laktasi'],
      ['Jam Layanan','24 jam untuk gawat darurat VK; poliklinik sesuai jadwal dokter'],
      ['Lokasi','Gedung A (VK) & Poli Kebidanan'],
      ['Reservasi','WhatsApp 0858-1415-0000 / Telp (0291) 4150501'],
      ['Pendampingan','Bidan pendamping, edukasi nifas & IMD'],
    ]"

    :gallery="[
      ['src'=>asset('assets/img/obgyn/vk-1.jpg'),'alt'=>'Ruang bersalin (VK)'],
      ['src'=>asset('assets/img/obgyn/triase.jpg'),'alt'=>'Area triase kebidanan'],
      ['src'=>asset('assets/img/obgyn/observasi.jpg'),'alt'=>'Ruang observasi ibu & bayi'],
    ]"
  >
    {{-- ===== Slot tambahan: Dokter & Bidan ===== --}}
    <div class="mt-4">
      <h3 class="h5 fw-bold mb-3">Dokter Spesialis Obstetri &amp; Ginekologi</h3>
      @php
        $dokterObgyn = [
          ['nama' => 'dr. Aisyah Putri, Sp.OG', 'sip' => 'SIP-001/RS', 'foto' => 'assets/img/obgyn/dr-aisyah.jpg', 'ket'=>'Spesialis Obstetri & Ginekologi'],
          ['nama' => 'dr. Bima Aditya, Sp.OG',  'sip' => 'SIP-002/RS', 'foto' => 'assets/img/obgyn/dr-bima.jpg',  'ket'=>'Spesialis Obstetri & Ginekologi'],
          ['nama' => 'dr. Citra N., Sp.OG(K)',  'sip' => 'SIP-003/RS', 'foto' => 'assets/img/obgyn/dr-citra.jpg', 'ket'=>'Konsultan'],
        ];
      @endphp
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4 mb-4">
        @foreach($dokterObgyn as $d)
          <div class="col">
            <article class="h-100 text-center p-3 rounded-4 border bg-white shadow-sm">
              <img src="{{ asset($d['foto']) }}" alt="{{ $d['nama'] }}"
                   style="width:92px;height:92px;object-fit:cover;border-radius:999px;display:block;margin:0 auto;box-shadow:0 8px 20px rgba(31,93,215,.15);">
              <h6 class="mt-3 mb-1">{{ $d['nama'] }}</h6>
              <div class="small text-muted">{{ $d['ket'] ?? 'Spesialis Obstetri & Ginekologi' }}</div>
              @if(!empty($d['sip'])) <div class="small text-muted">SIP: {{ $d['sip'] }}</div> @endif
            </article>
          </div>
        @endforeach
      </div>

      <h3 class="h5 fw-bold mb-3">Tim Bidan</h3>
      @php
        $bidan = [
          ['nama' => 'Sari Wulandari, A.Md.Keb', 'foto' => 'assets/img/obgyn/bidan-sari.jpg', 'ket'=>'Bidan Koordinator'],
          ['nama' => 'Dewi Puspita, A.Md.Keb',   'foto' => 'assets/img/obgyn/bidan-dewi.jpg', 'ket'=> 'Bidan'],
          ['nama' => 'Intan Maryam, A.Md.Keb',   'foto' => 'assets/img/obgyn/bidan-intan.jpg','ket'=> 'Bidan'],
          ['nama' => 'Rina Kurnia, A.Md.Keb',    'foto' => 'assets/img/obgyn/bidan-rina.jpg', 'ket'=> 'Bidan'],
        ];
      @endphp
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3 g-md-4">
        @foreach($bidan as $b)
          <div class="col">
            <article class="h-100 text-center p-3 rounded-4 border bg-white shadow-sm">
              <img src="{{ asset($b['foto']) }}" alt="{{ $b['nama'] }}"
                   style="width:84px;height:84px;object-fit:cover;border-radius:999px;display:block;margin:0 auto;box-shadow:0 8px 20px rgba(31,93,215,.12);">
              <div class="mt-3 fw-semibold">{{ $b['nama'] }}</div>
              <div class="small text-muted">{{ $b['ket'] ?? 'Bidan' }}</div>
            </article>
          </div>
        @endforeach
      </div>
    </div>
  </x-layouts.detail>
</x-layouts.app>
