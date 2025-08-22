@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Intensive Care</li>
                </ol>
            </nav>
            <h1 class="mb-4">Intensive Care</h1>
            <p>
                Unit Perawatan Intensif (ICU) kami memberikan perawatan terbaik untuk pasien dalam kondisi kritis dengan pengawasan ketat 24 jam.
            </p>
            <h3>Layanan Kami</h3>
            <ul>
                <li>Pengawasan pasien kritis 24 jam</li>
                <li>Peralatan medis canggih</li>
                <li>Tim dokter dan perawat berpengalaman</li>
                <li>Penanganan darurat cepat</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
