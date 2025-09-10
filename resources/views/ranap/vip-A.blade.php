<x-layouts.app :title="'Kamar VIP A'">
  <x-layouts.detail
    title="Kamar VIP A"
    subtitle="Kenyamanan premium untuk pemulihan yang lebih tenang."
    hero="{{ asset('assets/img/kamar-vipa.jpg') }}"

    aboutTitle="Tentang Kamar VIP A"
    :about="<<<'HTML'
      <p>
        Kamar VIP A dirancang untuk menghadirkan suasana yang tenang, privat, dan nyaman.
        Dilengkapi fasilitas lengkap untuk pasien dan keluarga agar proses perawatan lebih optimal.
      </p>
    HTML"

    :facilities="[
      'Tempat tidur elektrik dengan pengaturan posisi',
      'Kamar mandi dalam dengan water heater',
      'AC individual & ventilasi baik',
      'TV layar datar & Wi-Fi berkecepatan tinggi',
      'Sofa bed/sofa tamu untuk pendamping',
      'Kulkas mini & pantry kecil',
      'Meja kerja & lemari penyimpanan',
      'Nurse call system 24 jam',
    ]"

    :spec="[
      ['Luas Ruangan','± 20–24 m²'],
      ['Tipe Tempat Tidur','Elektrik, 1 pasien, matras anti-decubitus'],
      ['Kamar Mandi','Dalam, shower & water heater, perlengkapan dasar'],
      ['Fasilitas Tamu','Sofa/sofa bed, kursi visitor, meja samping'],
      ['Layanan Harian','Kebersihan kamar, pergantian linen, room service'],
      ['Keamanan','Nurse call, fire alarm, akses area terkontrol'],
    ]"

    :gallery="[
      ['src'=>asset('assets/img/vip-a-1.jpg'),'alt'=>'Kamar VIP A - Tampak Depan'],
      ['src'=>asset('assets/img/vip-a-2.jpg'),'alt'=>'Kamar VIP A - Area Tamu'],
      ['src'=>asset('assets/img/vip-a-3.jpg'),'alt'=>'Kamar VIP A - Kamar Mandi'],
    ]"

    :supporting="[
      'Visit dokter sesuai jadwal & monitoring perawat 24 jam',
      'Pengantaran obat & pemeriksaan penunjang (laboratorium/radiologi) sesuai indikasi',
      'Paket nutrisi pasien sesuai rekomendasi gizi',
    ]"
  />
</x-layouts.app>
