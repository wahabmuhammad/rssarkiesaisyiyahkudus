{{-- resources/views/auth/auth-modal.blade.php --}}
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk / Daftar</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <style>
    .page-bg{
      position: fixed; inset: 0; z-index: 0;
      background:
        radial-gradient(1200px 600px at -10% -10%, #8ec5fc33, transparent 60%),
        radial-gradient(1000px 500px at 110% 10%, #e0c3fc33, transparent 60%),
        radial-gradient(800px 400px at 50% 120%, #c2e9fb33, transparent 60%),
        url('{{ asset('assets/img/rssarkies/wasd.jpg') }}') center/cover no-repeat fixed,
        #f6f9fc;
      transition: filter .25s ease, opacity .25s ease;
    }
    .modal-open .page-bg{ filter: blur(14px) saturate(115%) brightness(.95); }
    .modal-backdrop{ background-color: rgba(15,23,42,0.35) !important; opacity: 1 !important; }

    .auth-modal{ position: relative; z-index: 1055; }
    .auth-modal .modal-dialog{ max-width: 1000px; }
    .auth-card{ border-radius: 24px; overflow: hidden; box-shadow: 0 24px 64px rgba(2,21,64,.12); }

    .auth-illustration{ min-height: 560px; background-size: cover; background-position: center; }
    .auth-right{ background:#fff; padding:32px 28px 36px; }
    @media (min-width: 992px){ .auth-right{ padding:48px; } }

    .brand-wrap{ display:flex; flex-direction:column; align-items:flex-start; gap:6px; margin-bottom:18px; }
    .brand-logo{ height:44px; width:auto; }
    .brand-title{ margin:0; font-weight:800; color:#111827; }

    .form-control{ height:48px; border-radius:12px; border-color:#e2e8f0; }
    .form-control:focus{ border-color:#1E88E5; box-shadow:0 0 0 .25rem rgba(30,136,229,.15); }
    .btn-primary{ background:#1E88E5; border-color:#1E88E5; }
    .btn-primary:hover{ filter:brightness(.95); }
    .btn-success{ background:#27ae60; border-color:#27ae60; }
  </style>
</head>
<body>

  <div class="page-bg"></div>

  {{-- MODAL --}}
  <div class="modal fade auth-modal" id="authModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content bg-transparent border-0">
        <div class="container-fluid p-0">
          <div class="row g-0 auth-card">

            {{-- Kiri: gambar RS --}}
            <div class="col-lg-6 d-none d-lg-block auth-illustration"
                 style="background-image: url('{{ asset('assets/img/rssarkies/wasd.jpg') }}');">
            </div>

            {{-- Kanan: konten --}}
            <div class="col-lg-6 auth-right">

              {{-- Logo + judul --}}
              <div class="brand-wrap">
                <img class="brand-logo" src="{{ asset('/assets/img/logo_sarkies.png') }}" alt="Logo RS">
                <h3 class="brand-title" id="brandTitle">Selamat Datang</h3>
              </div>

              {{-- ===== Pane LOGIN ===== --}}
              <div id="pane-login">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    <div class="invalid-feedback">Email wajib diisi.</div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">Kata sandi wajib diisi.</div>
                  </div>
                  <button class="btn btn-primary w-100">Masuk</button>
                  <!-- <p class="text-muted small text-center mt-3 mb-0">
                    Belum punya akun? <a href="#" id="toRegister">Daftar</a>
                  </p> -->
                </form>
              </div>

              <!-- {{-- ===== Pane REGISTER (disembunyikan awal) ===== --}}
              <div id="pane-register" class="d-none">
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    <div class="invalid-feedback">Email wajib diisi.</div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" minlength="8" required>
                    <div class="form-text">Minimal 8 karakter.</div>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" class="form-control" minlength="8" required>
                  </div>
                  <button class="btn btn-primary w-100">Daftar</button>
                  <p class="text-muted small text-center mt-3 mb-0">
                    Sudah punya akun? <a href="#" id="toLogin">Masuk</a>
                  </p>
                </form>
              </div> -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // buka modal
      var el = document.getElementById('authModal');
      var modal = new bootstrap.Modal(el, { backdrop: 'static', keyboard: false });
      modal.show();

      // elemen pane & kontrol
      const paneLogin   = document.getElementById('pane-login');
      const paneReg     = document.getElementById('pane-register');
      const brandTitle  = document.getElementById('brandTitle');
      const toRegister  = document.getElementById('toRegister');
      const toLogin     = document.getElementById('toLogin');

      function showLogin() {
        paneReg.classList.add('d-none');
        paneLogin.classList.remove('d-none');
        brandTitle.textContent = 'Selamat Datang';
        focusEmail('#pane-login');
        history.replaceState(null, '', location.pathname + '#login');
      }

      function showRegister() {
        paneLogin.classList.add('d-none');
        paneReg.classList.remove('d-none');
        brandTitle.textContent = 'Selamat Datang';
        focusEmail('#pane-register');
        history.replaceState(null, '', location.pathname + '#register');
      }

      function focusEmail(scopeSelector){
        const el = document.querySelector(scopeSelector + ' input[name="email"]');
        if (el) setTimeout(() => el.focus(), 150);
      }

      if (toRegister) toRegister.addEventListener('click', e => { e.preventDefault(); showRegister(); });
      if (toLogin)    toLogin.addEventListener('click',    e => { e.preventDefault(); showLogin(); });

      // buka langsung register via URL ...#register atau ?tab=register
      const params = new URLSearchParams(location.search);
      if (params.get('tab') === 'register' || location.hash === '#register') {
        showRegister();
      } else {
        showLogin();
      }

      // validasi Bootstrap
      document.querySelectorAll('.needs-validation').forEach(function (form) {
        form.addEventListener('submit', function (e) {
          if (!form.checkValidity()) { e.preventDefault(); e.stopPropagation(); }
          form.classList.add('was-validated');
        }, false);
      });
    });
  </script>
</body>
</html>
