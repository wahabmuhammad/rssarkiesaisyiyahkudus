@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Center of Excellence</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Klinik Kandungan dan Kebidanan</li>
                </ol>
            </nav>
            <h1 class="mb-4">Klinik Kandungan dan Kebidanan</h1>
            <p>
                Klinik Kandungan dan Kebidanan kami memberikan pelayanan kesehatan ibu dan anak
                secara komprehensif, mulai dari pemeriksaan kehamilan hingga persalinan dan perawatan pasca melahirkan.
            </p>

            <h3>Layanan Kami</h3>
            <ul>
                <li>Pemeriksaan kehamilan</li>
                <li>Persalinan normal dan operasi caesar</li>
                <li>USG 2D/3D/4D</li>
                <li>Konsultasi kesehatan reproduksi</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
