@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Emergency</li>
                </ol>
            </nav>
            <h1 class="mb-4">Emergency</h1>
            <p>
                Layanan gawat darurat kami siap 24 jam untuk memberikan penanganan cepat dan tepat pada keadaan darurat medis.
            </p>
            <h3>Layanan Kami</h3>
            <ul>
                <li>Ambulans siap siaga</li>
                <li>Penanganan kecelakaan</li>
                <li>Penanganan serangan jantung & stroke</li>
                <li>Tim medis darurat berpengalaman</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
