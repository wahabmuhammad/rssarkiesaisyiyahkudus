@include('public.header')

<main id="main" style="margin-top: 60px;">
    <section class="inner-page">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Fasilitas dan Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rehabilitasi Medik dan Fisioterapi</li>
                </ol>
            </nav>
            <h1 class="mb-4">Rehabilitasi Medik & Fisioterapi</h1>
            <p>
                Program rehabilitasi medik dan fisioterapi kami membantu pasien memulihkan fungsi tubuh setelah cedera atau operasi.
            </p>
            <h3>Layanan Kami</h3>
            <ul>
                <li>Fisioterapi pasca operasi</li>
                <li>Terapi cedera olahraga</li>
                <li>Rehabilitasi neurologis</li>
                <li>Program latihan fisik khusus</li>
            </ul>
        </div>
    </section>
</main>

@include('public.footer')
