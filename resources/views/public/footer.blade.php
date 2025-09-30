<footer id="footer" class="footer-compact">
  <!-- ATAS: abu-abu muda -->
  <div class="footer-top">
    <div class="container">
      <div class="row g-4 align-items-start">

        <!-- KIRI: Logo + Alamat + 6 submenu -->
        <div class="col-lg-7">
          <div class="footer-info">
            <img src="{{ asset('/assets/img/logo_sarkies.png') }}" alt="RS Sarkies 'Aisyiyah Kudus" class="footer-logo mb-3">
            <p class="addr mb-3">
              Jl. Mas Sirin No.79, Bakalankrapyak, Kec. Kaliwungu, Kabupaten Kudus<br>
              Jawa Tengah 59316
            </p>

            <!-- 6 submenu (2 kolom) -->
            <div class="link-grid">
              <a href="{{ url('/cari-dokter') }}" class="link-row">Cari Dokter <i class="bi bi-arrow-right"></i></a>
              <a href="{{ url('/tentang-kami') }}" class="link-row">Tentang Kami <i class="bi bi-arrow-right"></i></a>
              <a href="{{ url('/paket') }}" class="link-row">Paket <i class="bi bi-arrow-right"></i></a>
              <a href="{{ url('/panduan') }}" class="link-row">Panduan Pasien & Pengunjung <i class="bi bi-arrow-right"></i></a>
              <a href="{{ url('/rumah-sakit-kami') }}" class="link-row">Rumah Sakit Kami <i class="bi bi-arrow-right"></i></a>
              <a href="{{ url('/artikel') }}" class="link-row">Artikel <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- KANAN: Newsletter + Sosmed + Kontak -->
        <div class="col-lg-5">
          <div class="footer-newsletter d-flex flex-column">
            <h4 class="nl-title">Dapatkan panduan kesehatan mingguan dari para ahli kami</h4>

            <form action="#" method="post" class="newsletter-form mt-1 mb-2" novalidate>
              <input type="email" name="email" class="form-control newsletter-input"
                    placeholder="masukkan email anda" aria-label="Email">
              <button type="submit" class="btn newsletter-btn">Kirim</button>
            </form>

            <div class="contact-block mt-3">
              <h5 class="mb-2">Tetap Terhubung Dengan Kami</h5>

              <!-- SOSMED dipindah ke atas -->
              <div class="social-links mb-3">
                <a href="#" aria-label="Twitter/X"><i class="bi bi-twitter-x"></i></a>
                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
              </div>

              <!-- KONTAK di bawah sosmed -->
              <ul class="contact-list list-unstyled mb-0">
                <li class="mb-1"><strong>Pendaftaran:</strong> +62 858-1415-0000</li>
                <li class="mb-1"><strong>Pengaduan:</strong> +62 858-1415-0000</li>
                <li class="mb-1"><strong>Call Center:</strong> (0291) 4150501</li>
                <li class="mb-0"><strong>Email:</strong> rssarkies.ku@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>

      </div><!-- /row -->
    </div><!-- /container -->
  </div><!-- /footer-top -->

  <!-- BAWAH: bar copyright abu-abu tua -->
  <div class="footer-bottom">
    <div class="container">
      <div class="copyright">
        &copy; <span>RS Sarkies 'Aisyiyah Kudus</span>. All Rights Reserved
      </div>
    </div>
  </div>
</footer>

<style>
  /* ===== Warna & spacing umum ===== */
  #footer.footer-compact{color:#111;}
  #footer .footer-top{background:#F3F4F6; padding:28px 0 20px;} /* dipadatkan */

  /* Logo */
  #footer .footer-logo{max-width:250px; width:100%; height:auto; display:block;}
  #footer .addr{color:#444;font-size:.95rem;}

  /* ===== Menu kiri ===== */
  #footer .link-grid{display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:10px; margin-top:.25rem;}
  @media (max-width:576px){#footer .link-grid{grid-template-columns:1fr;}}
  #footer .link-row{display:flex; align-items:center; justify-content:space-between; padding:.70rem .9rem; border:1px solid #E2E6EA; border-radius:10px; background:#FAFBFB; font-weight:600; color:#111; text-decoration:none;}
  #footer .link-row:hover{background:#EEF1F0;}
  #footer .link-row .bi{font-size:1.05rem;}

  /* ===== Newsletter: diperkecil ===== */
  #footer{
    --nl-h: 36px;        /* tinggi input & tombol LEBIH KECIL */
    --nl-gap: 8px;       /* jarak input-tombol lebih rapat */
    --nl-pad-x: 14px;    /* padding kiri/kanan input */
    --nl-btn-pad-x: 16px;/* padding kiri/kanan tombol */
    --nl-font: .9rem;    /* font lebih kecil */
  }

  /* judul newsletter diperkecil & dirapatkan */
  #footer .nl-title{
    font-size:1rem; line-height:1.35; font-weight:600; margin:0 0 .25rem 0;
  }

  /* Grid: input = minmax(0,1fr); tombol = auto. Lebarnya dibatasi agar tidak terlalu panjang */
  #footer .newsletter-form{
    display:grid !important;
    grid-template-columns: minmax(0,1fr) auto !important;
    gap: var(--nl-gap) !important;
    align-items:center !important;
    width:100% !important;
    max-width:520px;               /* BATASI lebar form */
    background:transparent !important;
    border:0 !important;
    padding:0 !important;
    border-radius:0 !important;
    box-shadow:none !important;
  }
  @media (min-width:1200px){
    #footer .newsletter-form{ max-width:480px; } /* sedikit lebih pendek di layar lebar */
  }

  #footer .newsletter-input{
    width:100% !important;
    max-width:none !important;
    min-width:0 !important;        /* supaya bisa shrink di grid */
    background:#fff !important; color:#111 !important;
    height:var(--nl-h) !important; padding:0 var(--nl-pad-x) !important;
    border:1px solid #E5E7EB !important; outline:0 !important; box-shadow:none !important;
    border-radius:999px !important; appearance:none;
    font-size:var(--nl-font) !important;
  }
  #footer .newsletter-input::placeholder{color:#555; opacity:1;}

  #footer .newsletter-btn{
    background:#1E88E5 !important; color:#fff !important; border:0 !important;
    height:var(--nl-h) !important; padding:0 var(--nl-btn-pad-x) !important;
    border-radius:999px !important; font-weight:700; white-space:nowrap;
    font-size:var(--nl-font) !important; width:auto !important; flex:0 0 auto !important;
  }
  #footer .newsletter-btn:hover{background:#1565C0 !important;}
  #footer .newsletter-btn:active{background:#0D47A1 !important;}

  /* tetap horizontal juga di mobile (1fr | auto) */
  @media (max-width:576px){
    #footer .newsletter-form{ grid-template-columns: minmax(0,1fr) auto !important; }
  }

  /* ===== Kontak & Sosmed: dirapatkan ===== */
  #footer .contact-block h5{font-size:1.05rem;}
  #footer .social-links{display:flex; gap:10px; margin-top:6px;}
  #footer .social-links a{display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:10px; background:#F1F3F5; color:#111; font-size:18px; border:1px solid #E5E7EA; text-decoration:none; transition:transform .15s ease, background .15s ease;}
  #footer .social-links a:hover{background:#E7EAEE; transform:translateY(-2px);}

  /* ===== Copyright ===== */
  #footer .copyright{text-align:center; padding:12px 0 16px; margin:0; font-size:.9rem; color:#333;}
  #footer .copyright span{font-weight:600; color:#111;}
</style>
