<section id="promo" class="promo-section py-5 bg-white">
  <div class="container" data-aos="fade-up">

    <!-- Judul & Deskripsi -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold">Promo</h2>
        <p class="text-muted">Berbagai penawaran istimewa untuk anda.</p>
      </div>
      <a href="#" class="text-primary fw-semibold">Lihat Semua Promo →</a>
    </div>

    <!-- Card List -->
    <div class="row g-4">
      
      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100 border-0">
          <img src="promo1.jpg" class="card-img-top" alt="Promo Merdeka 17%">
          <div class="card-body">
            <h5 class="card-title fw-bold">Promo Merdeka 17% - Spesial Hari Kemerdekaan</h5>
            <p class="card-text small text-muted">
              Promo paket Medical Check Up di Jakarta dan Tangerang. Diskon 17% untuk semua paket MCU.
            </p>
            <a href="{{ $article['url'] }}" style="color: #1E88E5; class="fw-semibold">Lihat Detail</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100 border-0">
          <img src="promo2.jpg" class="card-img-top" alt="Private Parenting Class">
          <div class="card-body">
            <h5 class="card-title fw-bold">Private Parenting Class - Puri Indah</h5>
            <p class="card-text small text-muted">
              Kelas Newborn Care untuk melatih merawat bayi baru lahir, dari memandikan, menggendong, hingga menyusui.
            </p>
            <a href="{{ $article['url'] }}" style="color: #1E88E5; class="fw-semibold">Lihat Detail</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100 border-0">
          <img src="promo3.jpg" class="card-img-top" alt="Program Bayi Tabung">
          <div class="card-body">
            <h5 class="card-title fw-bold">Program Bayi Tabung Cicilan 0%</h5>
            <p class="card-text small text-muted">
              Program bayi tabung (IVF) dengan cicilan 0% hingga 6 bulan menggunakan kartu kredit BCA.
            </p>
            <a href="{{ $article['url'] }}" style="color: #1E88E5; class="fw-semibold">Lihat Detail</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<style>
.promo-section .btn-outline-success {
  border-color: #1E88E5;
  color: ##1E88E5;
}
.promo-section .btn-outline-success:hover {
  background-color: ##1E88E5;
  color: #fff;
}
</style>
