@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rawat Inap</li>
                </ol>
            </nav>
            <h1 class="mb-4">Rawat Inap</h1>
            <p>
                Layanan rawat inap kami menawarkan kenyamanan dan fasilitas lengkap selama masa perawatan pasien.
            </p>
            <h3>Fasilitas Kami</h3>
            <ul>
                <li>Kamar perawatan nyaman</li>
                <li>Pelayanan medis 24 jam</li>
                <li>Fasilitas pendukung keluarga pasien</li>
                <li>Makanan bergizi untuk pemulihan</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
