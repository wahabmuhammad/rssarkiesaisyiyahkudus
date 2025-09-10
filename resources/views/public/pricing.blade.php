<section id="promo" class="promo-section py-5 bg-white">
  <div class="container" data-aos="fade-up">

    <!-- Judul & Deskripsi -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold">Promo</h2>
        <p class="text-muted">Berbagai penawaran istimewa untuk anda.</p>
      </div>
    </div>

    <!-- LIST CARD: jadi track horizontal -->
    <div class="row g-4 flex-nowrap overflow-auto" id="promoTrack" role="region" aria-label="Daftar Promo">
      
      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100 border-0">
          <img src="promo1.jpg" class="card-img-top" alt="Promo Merdeka 17%">
          <div class="card-body">
            <h5 class="card-title fw-bold">Promo Merdeka 17% - Spesial Hari Kemerdekaan</h5>
            <p class="card-text small text-muted">
              Promo paket Medical Check Up di Jakarta dan Tangerang. Diskon 17% untuk semua paket MCU.
            </p>
            <a href="#" class="fw-semibold" style="color:#1E88E5; text-decoration:none;">Lihat Detail</a>
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
            <a href="#" class="fw-semibold" style="color:#1E88E5; text-decoration:none;">Lihat Detail</a>
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
            <a href="#" class="fw-semibold" style="color:#1E88E5; text-decoration:none;">Lihat Detail</a>
          </div>
        </div>
      </div>

      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="card shadow-sm h-100 border-0">
          <img src="promo1.jpg" class="card-img-top" alt="Promo Merdeka 17%">
          <div class="card-body">
            <h5 class="card-title fw-bold">Promo Merdeka 17% - Spesial Hari Kemerdekaan</h5>
            <p class="card-text small text-muted">
              Promo paket Medical Check Up di Jakarta dan Tangerang. Diskon 17% untuk semua paket MCU.
            </p>
            <a href="#" class="fw-semibold" style="color:#1E88E5; text-decoration:none;">Lihat Detail</a>
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
            <a href="#" class="fw-semibold" style="color:#1E88E5; text-decoration:none;">Lihat Detail</a>
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
            <a href="#" class="fw-semibold" style="color:#1E88E5; text-decoration:none;">Lihat Detail</a>
          </div>
        </div>
      </div>
    </div>

    <!-- PANAH NAV -->
    <div class="promo-nav d-flex align-items-center gap-3 mt-3">
      <button class="promo-btn" id="promoPrev" type="button" aria-label="Sebelumnya">
        <i class="bi bi-arrow-left"></i>
      </button>
      <button class="promo-btn" id="promoNext" type="button" aria-label="Berikutnya">
        <i class="bi bi-arrow-right"></i>
      </button>
    </div>

  </div>
</section>

<style>
  /* Track horizontal & sembunyikan scrollbar */
  #promoTrack{
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 8px;
    -ms-overflow-style: none;      /* IE/Edge */
    scrollbar-width: none;         /* Firefox */
  }
  #promoTrack::-webkit-scrollbar{  /* Chrome/Safari */
    display: none; height:0;
  }
  /* Setiap kolom snap dan tidak mengecil */
  #promoTrack > [class*="col-"]{ flex:0 0 auto; scroll-snap-align:start; }

  /* Tombol panah: lingkaran outline */
  .promo-btn{
    width:56px; height:56px; border-radius:50%;
    border:2px solid #e8e8e8; background:#fff;
    display:inline-flex; align-items:center; justify-content:center;
    transition: box-shadow .2s ease, transform .1s ease, border-color .2s ease;
  }
  .promo-btn i{ font-size:22px; line-height:1; }
  .promo-btn:hover{ border-color:#dcdcdc; box-shadow:0 2px 8px rgba(0,0,0,.06); }
  .promo-btn:active{ transform:scale(.98); }
  .promo-btn:disabled{ opacity:.4; pointer-events:none; }

  /* (opsional) samakan tinggi gambar agar rapi */
  .promo-section .card-img-top{
    aspect-ratio: 16/9; object-fit: cover;
  }

  /* Perbaikan warna tombol outline jika nanti dipakai */
  .promo-section .btn-outline-success{
    border-color:#1E88E5; color:#1E88E5;
  }
  .promo-section .btn-outline-success:hover{
    background-color:#1E88E5; color:#fff;
  }
</style>

<script>
(function(){
  const track = document.getElementById('promoTrack');
  const prev  = document.getElementById('promoPrev');
  const next  = document.getElementById('promoNext');
  if(!track || !prev || !next) return;

  function stepSize(){
    // geser sebesar 1 kolom (card)
    const col = track.querySelector('[class*="col-"]');
    return col ? Math.round(col.getBoundingClientRect().width) : Math.round(track.clientWidth * 0.8);
  }
  function updateBtns(){
    const max = track.scrollWidth - track.clientWidth - 1;
    prev.disabled = track.scrollLeft <= 0;
    next.disabled = track.scrollLeft >= max;
  }
  prev.addEventListener('click', () => track.scrollBy({left:-stepSize(), behavior:'smooth'}));
  next.addEventListener('click', () => track.scrollBy({left: stepSize(), behavior:'smooth'}));
  track.addEventListener('scroll', updateBtns, {passive:true});
  window.addEventListener('resize', updateBtns);
  updateBtns();
})();
</script>
