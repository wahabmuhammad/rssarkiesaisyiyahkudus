@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Center of Excellence</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orthopedic Center</li>
                </ol>
            </nav>
            <h1 class="mb-4">Orthopedic Center</h1>
            <p>
                Orthopedic Center kami menyediakan layanan diagnosa, pengobatan, dan rehabilitasi
                untuk berbagai kondisi tulang, sendi, dan otot. Dengan dukungan dokter spesialis
                berpengalaman dan peralatan modern, kami membantu pasien pulih dengan optimal.
            </p>

            <h3>Layanan Kami</h3>
            <ul>
                <li>Operasi ortopedi</li>
                <li>Perawatan cedera olahraga</li>
                <li>Terapi rehabilitasi pasca operasi</li>
                <li>Konsultasi tulang dan sendi</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
