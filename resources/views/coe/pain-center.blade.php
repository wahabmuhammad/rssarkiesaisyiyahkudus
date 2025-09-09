{{-- resources/views/coe/pain-center.blade.php --}}

<x-layouts.app :title="'Pain Clinic'">
  <x-layouts.detail
    title="Pain Clinic"
    subtitle="Layanan khusus untuk mengatasi nyeri dengan teknologi modern."
    hero="{{ asset('images/pain-center.jpg') }}"

    aboutTitle="Tentang Pain Center"
    :about="<<<'HTML'
      <p>
        Pain Center berfokus pada diagnosis, pengobatan, dan manajemen nyeri secara menyeluruh—
        mulai dari nyeri akut hingga kronis—dengan pendekatan multidisiplin.
      </p>
    HTML"

    :facilities="[
      'Konsultasi & penilaian nyeri komprehensif',
      'Intervensi berbasis panduan gambar: nerve block, epidural, radiofrequency ablation (RFA)',
      'Terapi modalitas: TENS & fisioterapi',
      'Farmakoterapi & titrasi obat nyeri',
      'Edukasi manajemen nyeri & home program',
      'Klinik rujukan internal lintas poli',
    ]"

    :spec="[
      ['Jenis Layanan','Intervensi nyeri, TENS/fisioterapi, farmakoterapi, edukasi'],
      ['Jam Layanan','Senin–Sabtu 08.00–20.00'],
      ['Lokasi','Gedung A, Lantai 2'],
      ['Reservasi','WhatsApp 0858-1415-0000 atau Call Center (0291) 4150501'],
      ['Rujukan','Rawat jalan & rujukan internal poli'],
    ]"

    :gallery="[
      ['src'=>asset('images/pain-center-1.jpg'),'alt'=>'Pain Clinic - Ruang Tindakan'],
      ['src'=>asset('images/pain-center-2.jpg'),'alt'=>'Pain Clinic - Area Konsultasi'],
      ['src'=>asset('images/pain-center-3.jpg'),'alt'=>'Pain Clinic - Fisioterapi/TENS'],
    ]"

    :supporting="[
      'Screening awal & penjadwalan intervensi oleh perawat nyeri',
      'Kolaborasi dokter anestesi, neurologi, dan rehabilitasi medik',
      'Pemantauan berkala dan penyesuaian rencana terapi',
    ]"
  >
    </div>
  </x-layouts.detail>
</x-layouts.app>
