<!-- resources/views/karir.blade.php -->
@include('public.header')

<section class="career py-5" style="background-color: #fff; margin-top: 60px;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mb-3">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Karir</li>
            </ol>
        </nav>

        <!-- Judul -->
        <h2 class="mb-4 fw-bold text-dark">Karir</h2>

        <!-- Deskripsi -->
        <p class="mb-5">
            RS Pondok Indah Group terus bertumbuh untuk memberikan layanan kesehatan terdepan dengan mengutamakan kenyamanan pasien.
            Tenaga kerja yang kompeten merupakan salah satu hal yang kami banggakan. Apabila Anda memiliki keinginan kuat untuk
            mengembangkan diri sebagai seorang profesional dalam lingkungan kerja yang dinamis, kami mengundang Anda untuk bergabung
            bersama kami. Lihat posisi yang tersedia di bawah ini dan klik untuk mempelajari lebih lanjut.
        </p>

        <!-- Posisi Tersedia -->
        <h5 class="fw-bold mb-4">Available Positions</h5>

        <div class="row">
            <!-- Contoh Card Lowongan -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Staff Apoteker</h5>
                        <span class="badge bg-secondary mb-2">Tidak Aktif</span>
                        <p class="text-muted mb-2"><i class="bi bi-briefcase"></i> Apoteker</p>
                        
                        <h6 class="fw-bold">Deskripsi:</h6>
                        <p>Membantu Apoteker dalam pelayanan resep dan penyiapan obat. Melakukan pengecekan stok, penataan, dan pengelolaan obat sesuai standar...</p>
                        <a href="#" class="text-success">Baca Selengkapnya</a>

                        <h6 class="fw-bold mt-3">Persyaratan:</h6>
                        <p>Pendidikan minimal SMK Farmasi atau D3 Farmasi. Memiliki STRTTK yang masih berlaku...</p>
                        <a href="#" class="text-success">Baca Selengkapnya</a>

                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> Batas Akhir: 2025-06-29
                            </small>
                            <span class="text-danger fw-bold ms-2">(Sudah Berakhir)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card lain tinggal duplikat -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Perawat Umum</h5>
                        <span class="badge bg-success mb-2">Aktif</span>
                        <p class="text-muted mb-2"><i class="bi bi-briefcase"></i> Perawat</p>
                        
                        <h6 class="fw-bold">Deskripsi:</h6>
                        <p>Memberikan pelayanan keperawatan sesuai prosedur rumah sakit, melakukan observasi kondisi pasien...</p>
                        <a href="#" class="text-success">Baca Selengkapnya</a>

                        <h6 class="fw-bold mt-3">Persyaratan:</h6>
                        <p>Pendidikan minimal D3 Keperawatan. Memiliki STR yang masih berlaku...</p>
                        <a href="#" class="text-success">Baca Selengkapnya</a>

                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> Batas Akhir: 2025-09-15
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('public.footer')
