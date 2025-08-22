@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Farmasi</li>
                </ol>
            </nav>
            <h1 class="mb-4">Farmasi</h1>
            <p>
                Farmasi kami menyediakan obat-obatan yang lengkap dan berkualitas, dengan pelayanan ramah dan profesional.
            </p>
            <h3>Layanan Kami</h3>
            <ul>
                <li>Penjualan obat resep dan non-resep</li>
                <li>Konsultasi penggunaan obat</li>
                <li>Obat generik dan bermerek</li>
                <li>Layanan racikan obat</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
