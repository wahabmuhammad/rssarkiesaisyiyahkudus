{{-- resources/views/coe/pain-center.blade.php --}}

@include('public.header')

<main id="main" style="margin-top:120px">
    <!-- Hero Section -->
    <section class="hero text-center text-white d-flex align-items-center justify-content-center"
        style="background: url('{{ asset('images/pain-center.jpg') }}') center/cover no-repeat;
               min-height: 300px;
               text-shadow: 1px 1px 5px rgba(0,0,0,0.6);">
        <div>
            <h2 class="display-5 fw-bold">Pain Center</h2>
            <p class="lead">Layanan khusus untuk mengatasi nyeri dengan teknologi modern.</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5">
        <div class="container">
            <h3 class="fw-bold">Tentang Pain Center</h3>
            <p>
                Pain Center adalah unit pelayanan yang berfokus pada diagnosis, pengobatan, 
                dan manajemen nyeri secara menyeluruh, mulai dari nyeri akut hingga kronis.
            </p>

            <h4 class="fw-bold mt-4">Layanan yang Tersedia</h4>
            <ul>
                <li>Terapi nyeri punggung</li>
                <li>Pengobatan migrain</li>
                <li>Terapi nyeri sendi</li>
                <li>Rehabilitasi pasca operasi</li>
            </ul>

            <h4 class="fw-bold mt-4">Dokter Spesialis</h4>
            <p>
                Kami didukung oleh tim dokter spesialis anestesi, neurologi, dan fisioterapi berpengalaman.
            </p>
        </div>
    </section>
</main>

@include('public.footer')
