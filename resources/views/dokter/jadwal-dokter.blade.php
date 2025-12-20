<!-- resources/views/dokter/jadwal-dokter.blade.php -->
@include('public.header')

<section class="py-5" style="background-color: #ffffff;">
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
            <p class="mb-0">{{ $tanggal ?? '—' }}</p>
        </div>

        <!-- Grid Jadwal -->
        <div class="row">
            @if(isset($jadwal) && count($jadwal) > 0)
                @foreach($jadwal as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-header bg-primary text-white fw-bold">
                                {{ strtoupper($item['spesialis'] ?? 'UMUM') }}
                            </div>
                            <div class="card-body">
                                @if(isset($item['dokter']) && count($item['dokter']) > 0)
                                    @foreach($item['dokter'] as $d)
                                        <div class="d-flex align-items-center mb-3">
                                            <!-- Foto Dokter / Placeholder -->
                                            <div style="width:60px; height:60px; flex-shrink:0;">
                                                @if(!empty($d['foto']))
                                                    <img src="{{ asset($d['foto']) }}" alt="{{ $d['nama'] ?? 'Dokter' }}"
                                                         style="width:60px; height:60px; object-fit:cover; border-radius:50%; display:block;">
                                                @else
                                                    @php
                                                        $namaLengkap = $d['nama'] ?? 'Dr';
                                                        $parts = preg_split('/\s+/', trim($namaLengkap));
                                                        if(count($parts) >= 2){
                                                            $initials = strtoupper(substr($parts[0],0,1) . substr($parts[1],0,1));
                                                        } else {
                                                            $initials = strtoupper(substr($parts[0],0,2));
                                                        }
                                                    @endphp
                                                    <div style="width:60px; height:60px; border-radius:50%; background:#e9ecef; display:flex; align-items:center; justify-content:center; font-weight:600; color:#495057;">
                                                        {{ $initials }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Info Dokter -->
                                            <div class="ms-3">
                                                <h6 class="fw-bold mb-1" style="font-size:0.95rem;">
                                                    {{ $d['nama'] ?? 'Dokter' }}
                                                </h6>
                                                <div class="d-flex flex-column">
                                                    <small class="text-muted">
                                                        <i class="bi bi-clock"></i>
                                                        {{ $d['jam'] ?? '—' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-muted">Belum ada jadwal untuk kategori ini.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">
                            <h5 class="mb-2">Belum ada data jadwal</h5>
                            <p class="text-muted mb-0">Silakan cek kembali nanti atau hubungi bagian administrasi.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@include('public.footer')
