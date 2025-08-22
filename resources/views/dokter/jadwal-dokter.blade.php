<!-- resources/views/jadwal-dokter.blade.php -->
@include('public.header')

<section class="py-5" style="background-color: #ffffff; margin-top: 60px;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mb-4">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Jadwal Dokter</li>
            </ol>
        </nav>

        <!-- Judul -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Jadwal Dokter</h2>
            <h5 class="text-muted">Rumah Sakit Sarkies 'Aisyiyah Kudus</h5>
            <p class="mb-0">Selasa, 12 Agustus 2025</p>
        </div>

        <!-- Grid Jadwal -->
        <div class="row">
            <!-- Card Contoh -->
            @php
                $jadwal = [
                    [
                        'spesialis' => 'Spesialis Dalam',
                        'dokter' => [
                            ['nama' => 'dr. Wahyu Adirama S.Sp.PD', 'jam' => '08.00 - 10.45'],
                            ['nama' => 'dr. Mudzakir Djipul, Sp.PD, FINASM', 'jam' => '10.00 - 13.00'],
                        ]
                    ],
                    [
                        'spesialis' => 'Spesialis Bedah',
                        'dokter' => [
                            ['nama' => 'dr. Tri Djoko Widagdo, Sp.B', 'jam' => '15.00 - 16.30'],
                            ['nama' => 'dr. Lutfi Setyo W, Sp.B', 'jam' => '10.00 - 12.00'],
                        ]
                    ],
                    [
                        'spesialis' => 'Spesialis Kandungan',
                        'dokter' => [
                            ['nama' => 'dr. Aldila Geri Instantina, Sp.OG', 'jam' => 'Pagi 08.30 - 12.00 | Sore 17.00 - 20.00'],
                            ['nama' => 'dr. Trubus Sengesumpeno, Sp.OG', 'jam' => 'Pagi 08.00 - 12.00 | Sore 14.00 - 15.30'],
                        ]
                    ],
                    // Tambah data spesialis lainnya...
                ];
            @endphp

            @foreach($jadwal as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header bg-primary text-white fw-bold">
                            {{ strtoupper($item['spesialis']) }}
                        </div>
                        <div class="card-body">
                            @foreach($item['dokter'] as $d)
                                <div class="d-flex align-items-center mb-3">
                                    <!-- Foto Dokter -->
                                    <div style="width: 60px; height: 60px; background-color: #e9ecef; border-radius: 50%; flex-shrink: 0;">
                                        <!-- Tempat foto, isi nanti -->
                                    </div>
                                    <!-- Info Dokter -->
                                    <div class="ms-3">
                                        <h6 class="fw-bold mb-1">{{ $d['nama'] }}</h6>
                                        <small class="text-muted"><i class="bi bi-clock"></i> {{ $d['jam'] }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('public.footer')
