{{-- resources/views/fasilitas/diagnostic-center.blade.php --}}

<x-layouts.app :title="'Diagnostic Center'">
  <x-layouts.detail
    title="Diagnostic Center"
    subtitle="Pemeriksaan komprehensif dengan teknologi mutakhir."
    hero="{{ asset('assets/img/diagnostic/hero.jpg') }}"

    aboutTitle="Tentang Diagnostic Center"
    :about="<<<'HTML'
      <p>
        Diagnostic Center kami menyediakan layanan pemeriksaan medis yang cepat dan akurat
        dengan dukungan peralatan modern serta tim analis, radiografer, dan dokter spesialis.
      </p>
    HTML"

    :facilities="[
      'Laboratorium klinik: hematologi, kimia klinik, imunologi, mikrobiologi',
      'Radiologi: X-Ray (rontgen) digital, USG 2D/4D, CT-Scan, MRI*',
      'Elektromedis: EKG, EEG, EMG, Treadmill Test',
      'Skrining kesehatan & Medical Check-Up (MCU)',
      'Sistem informasi hasil online & integrasi rekam medis',
      'Prosedur sesuai standar mutu & keselamatan pasien',
    ]"

    :spec="[
      ['Jam Operasional','Senin–Sabtu 07.00–20.00; IGD & penunjang 24 jam*'],
      ['Pengambilan Sampel','Walk-in & janji temu; home service*'],
      ['Lokasi','Gedung B – Lantai 1 (Lab) & Lantai 2 (Radiologi)'],
      ['Hasil Pemeriksaan','Cetak/softcopy, tersedia akses online*'],
      ['Catatan','*Tergantung ketersediaan alat/jadwal dokter'],
    ]"

    :gallery="[
      ['src'=>asset('assets/img/diagnostic/lab-1.jpg'),'alt'=>'Laboratorium klinik'],
      ['src'=>asset('assets/img/diagnostic/radiology-1.jpg'),'alt'=>'Radiologi – USG/Rontgen'],
      ['src'=>asset('assets/img/diagnostic/ct-1.jpg'),'alt'=>'CT Scan / MRI'],
    ]"

    :supporting="[
      'Konsultasi hasil oleh dokter penanggung jawab layanan',
      'Paket MCU untuk perusahaan & individu',
      'Alur pelayanan ramah dan efisien',
    ]"
  />
</x-layouts.app>
