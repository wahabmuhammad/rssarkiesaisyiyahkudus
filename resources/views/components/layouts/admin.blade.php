<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --blue-100:#e6f0ff; --blue-600:#2563eb; --bg:linear-gradient(135deg,#eef6ff,#f7fbff);
      --card-radius:18px;
    }
    body{ background: var(--bg); }
    .admin-shell{ min-height:100vh; }
    .sidebar{
      position:sticky; top:0; height:100vh; padding:18px 14px;
      background: rgba(255,255,255,.7); backdrop-filter: blur(8px);
      border-right: 1px solid rgba(0,0,0,0.06);
    }
    .sidebar .nav-link{ border-radius:12px; padding:.7rem .9rem; display:flex; gap:.6rem; font-weight:500; color:#334155; }
    .sidebar .nav-link.active{ background:var(--blue-600); color:#fff; box-shadow:0 6px 14px rgba(37,99,235,.25); }
    .sidebar .nav-link:hover{ background:var(--blue-100); }
    .topbar{ padding:18px 0 8px; }
    .searchbox{ background:#fff; border-radius:999px; padding:8px 14px; border:1px solid rgba(0,0,0,.06); max-width:480px; }
    .card-soft{ border:0; border-radius:var(--card-radius); box-shadow:0 8px 24px rgba(20,44,90,.06); background:#fff; }
  </style>

  @stack('head')
</head>
<body>
  <div class="container-fluid admin-shell">
    <div class="row">
      <aside class="col-12 col-lg-2 sidebar">
        @include('admin.partials.sidebar')
      </aside>
      <main class="col-12 col-lg-10 py-3">
        @include('admin.partials.topbar')
        <div class="content">
          @yield('content')
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
