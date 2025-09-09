{{-- resources/views/fasilitas/rehabilitasi.blade.php --}}

<x-layouts.app :title="'Rehabilitasi Medik & Fisioterapi'">
  <x-layouts.detail
    title="Rehabilitasi Medik & Fisioterapi"
    subtitle="Pemulihan fungsi & kualitas hidup pasca cedera/operasi."
    hero="{{ asset('assets/img/rehab/rehab-hero.jpg') }}"

    aboutTitle="Tentang Rehabilitasi Medik & Fisioterapi"
    :about="<<<'HTML'
      <p>
        Layanan rehabilitasi kami membantu pemulihan pasca cedera, operasi, stroke, dan gangguan gerak
        dengan pendekatan multidisiplin. Program disesuaikan kebutuhan pasien agar aman dan efektif.
      </p>
    HTML"

    :facilities="[
      'Fisioterapi muskuloskeletal (nyeri punggung/leher, bahu, lutut)',
      'Rehabilitasi neurologis (pasca stroke, cedera saraf)',
      'Latihan fungsional & <em>gait training</em> (alat bantu jalan)',
      'Modalitas: TENS, ultrasound therapy, IR/heat/cold therapy',
      'Terapi manual & <em>soft tissue release</em>',
      'Kondisi olahraga: sprain/strain, pasca cedera ligamen/meniskus',
      'Program pasca operasi (arthroscopy, TKR/THR, ORIF, dll.)',
      'Edukas‎i ergonomi, pencegahan cedera, & <em>home program</em>',
    ]"

    :spec="[
      ['Jadwal Layanan','Senin–Sabtu 08.00–20.00 (by appointment)'],
      ['Durasi Sesi','± 45–60 menit/sesi (tergantung program)'],
      ['Lokasi','Gedung B, Lantai 1 – Rehabilitasi Medik & Fisioterapi'],
      ['Rujukan','Poli spesialis/IGD/MCU atau datang langsung*'],
      ['Catatan','*Evaluasi awal oleh fisioterapis/rehab medik menentukan rencana terapi'],
    ]"

    :gallery="[
      ['src'=>asset('assets/img/rehab/rehab-1.jpg'),'alt'=>'Area latihan & fisioterapi'],
      ['src'=>asset('assets/img/rehab/rehab-2.jpg'),'alt'=>'Modalitas terapi (TENS/US)'],
      ['src'=>asset('assets/img/rehab/rehab-3.jpg'),'alt'=>'Latihan fungsional & gait training'],
    ]"

    :supporting="[
      'Penilaian awal komprehensif & evaluasi berkala',
      'Rencana terapi individual & edukasi keluarga',
      'Koordinasi dengan dokter penanggung jawab pasien',
    ]"
  />
</x-layouts.app>
