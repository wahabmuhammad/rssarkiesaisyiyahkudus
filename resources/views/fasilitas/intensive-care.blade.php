{{-- resources/views/fasilitas/intensive-care.blade.php --}}

<x-layouts.app :title="'Intensive Care'">
  <x-layouts.detail
    title="Intensive Care"
    subtitle="Perawatan intensif komprehensif dengan pemantauan 24 jam."
    hero="{{ asset('assets/img/icu/icu-hero.jpg') }}"

    aboutTitle="Tentang Intensive Care (ICU)"
    :about="<<<'HTML'
      <p>
        Unit Perawatan Intensif (ICU) kami memberikan penanganan pasien kondisi kritis
        dengan pemantauan ketat, dukungan alat lengkap, dan kolaborasi tim multidisiplin.
      </p>
    HTML"

    :facilities="[
      'Ventilator canggih & dukungan oksigen sentral',
      'Monitor multiparameter bedside & sentral',
      'Infusion pump & syringe pump pada setiap bed',
      'Fasilitas isolasi & pengendalian infeksi',
      'CRRT/hemodialisis* bekerja sama dengan nefrologi',
      'Pemeriksaan penunjang bedside* (X-ray portabel, USG point-of-care)',
      'Akses cepat ke lab & radiologi 24 jam',
      'Ruang tunggu keluarga & edukasi pendamping',
    ]"

    :spec="[
      ['Kapasitas','Beberapa tempat tidur dengan pemantauan individual'],
      ['Rasio Keperawatan','Penugasan perawat khusus per pasien (sesuai kondisi klinis)'],
      ['Jam Kunjungan','Sesuai kebijakan unit & kondisi pasien'],
      ['Lokasi','Gedung C, Lantai 2 (ICU)'],
      ['Koordinasi','Kolaborasi dokter penanggung jawab pasien & tim ICU'],
      ['Catatan','*Tergantung indikasi klinis & ketersediaan'],
    ]"

    :gallery="[
      ['src'=>asset('assets/img/icu/icu-1.jpg'),'alt'=>'Bed ICU & monitor multiparameter'],
      ['src'=>asset('assets/img/icu/icu-2.jpg'),'alt'=>'Ventilator & perangkat dukungan napas'],
      ['src'=>asset('assets/img/icu/icu-3.jpg'),'alt'=>'Area perawatan intensif'],
    ]"

    :supporting="[
      'Pemantauan 24/7 oleh tim perawat terlatih',
      'Tata laksana berbasis protokol keselamatan pasien',
      'Edukasi keluarga & perencanaan perawatan lanjutan',
    ]"
  />
</x-layouts.app>
