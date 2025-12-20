<section id="promo" class="promo-section py-5 bg-white">
  <div class="container" data-aos="fade-up">

    <!-- Judul & Deskripsi -->
    <div class="mb-4">
      <h2 class="fw-bold mb-1">Promo dan Paket</h2>
      <p class="text-muted mb-0">Berbagai penawaran istimewa untuk anda.</p>
    </div>

    <!-- FILTER KATEGORI -->
    <div class="d-flex flex-wrap gap-3 mb-4" role="tablist" aria-label="Filter kategori promo/paket">
      <button type="button" class="chip is-active" data-filter="all" aria-selected="true" role="tab">All</button>
      <button type="button" class="chip" data-filter="paket" role="tab" aria-selected="false">Paket</button>
      <button type="button" class="chip" data-filter="promo" role="tab" aria-selected="false">Promo</button>
    </div>

    @php
      // Ganti path gambar & link sesuai asetmu
      $items = [
        // ====== PAKET ======
        [
          'title' => 'Paket Pra Nikah Basic',
          'desc'  => 'Paket skrining kesehatan dasar untuk pasangan yang akan menikah.',
          'img'   => asset('assets/img/paket/pra-nikah-basic.jpg'),
          'href'  => url('/paket/pra-nikah-basic'),
          'cat'   => 'paket',
        ],
        [
          'title' => 'Paket Persiapan Kehamilan Premium',
          'desc'  => 'Paket lengkap persiapan kehamilan dengan konsultasi dokter spesialis.',
          'img'   => asset('assets/img/paket/persiapan-kehamilan-premium.jpg'),
          'href'  => url('/paket/persiapan-kehamilan-premium'),
          'cat'   => 'paket',
        ],
        [
          'title' => 'Pemeriksaan Kolesterol',
          'desc'  => 'Cek profil lipid lengkap untuk deteksi dini risiko kardiovaskular.',
          'img'   => asset('assets/img/paket/kolesterol.jpg'),
          'href'  => url('/paket/pemeriksaan-kolesterol'),
          'cat'   => 'paket',
        ],
        [
          'title' => 'Pemeriksaan Diabetes',
          'desc'  => 'Paket skrining diabetes: gula darah, HbA1c, dan konsultasi.',
          'img'   => asset('assets/img/paket/diabetes.jpg'),
          'href'  => url('/paket/pemeriksaan-diabetes'),
          'cat'   => 'paket',
        ],
        [
          'title' => 'Paket MCU (Medical Check Up)',
          'desc'  => 'Pilihan paket MCU sesuai kebutuhan perusahaan maupun perorangan.',
          'img'   => asset('assets/img/paket/mcu.jpg'),
          'href'  => url('/paket/mcu'),
          'cat'   => 'paket',
        ],

        // ====== PROMO ======
        [
          'title' => 'Promo Merdeka 17% - Spesial Hari Kemerdekaan',
          'desc'  => 'Diskon 17% untuk semua paket MCU di Jakarta & Tangerang.',
          'img'   => asset('assets/img/promo/promo-17an.jpg'),
          'href'  => url('/promo/merdeka-17'),
          'cat'   => 'promo',
        ],
      ];
    @endphp

    <!-- LIST CARD: track horizontal -->
    <div class="row g-4 flex-nowrap overflow-auto" id="promoTrack" role="region" aria-label="Daftar Promo & Paket">
      @foreach ($items as $it)
        <div class="col-lg-4 col-md-6" data-category="{{ $it['cat'] }}">
          <div class="card shadow-sm h-100 border-0">
            <img src="{{ $it['img'] }}" class="card-img-top" alt="{{ $it['title'] }}">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $it['title'] }}</h5>
              <p class="card-text small text-muted">{{ $it['desc'] }}</p>
              <a href="{{ $it['href'] }}" class="fw-semibold link-primary text-decoration-none">Lihat Detail</a>
            </div>
          </div>
        </div>
      @endforeach
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
  :root{
    --blue:#1E88E5;
    --blue-weak:#E9F2FF;
  }
  /* CHIP FILTER */
  .chip{
    border:0; outline:0; cursor:pointer;
    padding:.6rem 1.1rem; border-radius:999px;
    background:var(--blue-weak); color:var(--blue);
    font-weight:700; letter-spacing:.2px;
    box-shadow:0 6px 18px rgba(30,136,229,.12);
    transition:transform .08s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
  }
  .chip:hover{ transform:translateY(-1px); box-shadow:0 10px 24px rgba(30,136,229,.16); }
  .chip.is-active{ background:var(--blue); color:#fff; box-shadow:0 10px 28px rgba(30,136,229,.28); }

  /* Track horizontal & sembunyikan scrollbar */
  #promoTrack{ scroll-snap-type:x mandatory; -webkit-overflow-scrolling:touch; padding-bottom:8px; -ms-overflow-style:none; scrollbar-width:none; }
  #promoTrack::-webkit-scrollbar{ display:none; height:0; }
  #promoTrack > [class*="col-"]{ flex:0 0 auto; scroll-snap-align:start; }

  /* Gambar rapi 16:9 */
  .promo-section .card-img-top{ aspect-ratio:16/9; object-fit:cover; }

  /* Tombol panah */
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
</style>

<script>
(function(){
  // Horizontal nav
  const track = document.getElementById('promoTrack');
  const prev  = document.getElementById('promoPrev');
  const next  = document.getElementById('promoNext');

  function stepSize(){
    const col = track.querySelector('[class*="col-"]:not(.d-none)');
    return col ? Math.round(col.getBoundingClientRect().width) : Math.round(track.clientWidth*0.8);
  }
  function updateBtns(){
    const max = track.scrollWidth - track.clientWidth - 1;
    prev.disabled = track.scrollLeft <= 0;
    next.disabled = track.scrollLeft >= max;
  }
  if (track && prev && next){
    prev.addEventListener('click', ()=> track.scrollBy({left:-stepSize(), behavior:'smooth'}));
    next.addEventListener('click', ()=> track.scrollBy({left: stepSize(), behavior:'smooth'}));
    track.addEventListener('scroll', updateBtns, {passive:true});
    window.addEventListener('resize', updateBtns);
    updateBtns();
  }

  // Filter kategori
  const chips = document.querySelectorAll('.chip');
  function applyFilter(target){
    const filter = target.dataset.filter; // "all" | "paket" | "promo"
    chips.forEach(c => {
      c.classList.toggle('is-active', c === target);
      c.setAttribute('aria-selected', c === target ? 'true' : 'false');
    });
    const cards = track.querySelectorAll('[data-category]');
    cards.forEach(col => {
      const cat = col.getAttribute('data-category');
      const show = (filter === 'all') || (cat === filter);
      col.classList.toggle('d-none', !show);
    });
    track.scrollTo({left:0, behavior:'smooth'});
    updateBtns();
  }
  chips.forEach(chip => chip.addEventListener('click', ()=> applyFilter(chip)));
})();
</script>
