@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Diagnostic Center</li>
                </ol>
            </nav>
            <h1 class="mb-4">Diagnostic Center</h1>
            <p>
                Diagnostic Center kami menyediakan layanan pemeriksaan medis dengan teknologi mutakhir untuk memastikan diagnosis yang cepat dan akurat.
            </p>
            <h3>Layanan Kami</h3>
            <ul>
                <li>Pemeriksaan laboratorium lengkap</li>
                <li>CT Scan dan MRI</li>
                <li>Rontgen dan USG</li>
                <li>Pemeriksaan kesehatan umum</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
