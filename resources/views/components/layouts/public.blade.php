{{-- resources/views/components/layouts/public.blade.php --}}
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title','RS Sarkies')</title>
  <meta name="description" content="@yield('meta_description','')">

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <style>
    :root{
      --blue-50:#eff6ff; --blue-100:#e6f0ff; --blue-200:#cfe3ff;
      --blue-500:#2563eb; --blue-600:#1E88E5;
      --ink:#101828; --muted:#6b7280;
      --bg:linear-gradient(135deg,#eef6ff,#f7fbff);
      --radius:18px;
    }
    html,body{height:100%}
    body{background:var(--bg); color:#111827; overflow-x:hidden}
    a{color:var(--blue-600)} a:hover{color:#1557b0}
    .page-container{min-height:100%; display:flex; flex-direction:column}
    main{flex:1 0 auto}
    footer{flex-shrink:0}
    .page-header{
      background:linear-gradient(180deg,var(--blue-50),#ffffff);
      border-radius:24px; border:1px solid #eef2f7;
      box-shadow:0 8px 24px rgba(16,24,40,.06);
    }
  </style>

  @stack('head')
</head>
<body>
  <div class="page-container">
    {{-- HEADER situs (punyamu) --}}
    @includeWhen(View::exists('public.header'), 'public.header')

    <main>
      <div class="container py-3 py-md-4">
        {{-- ====== PAGE HEADER OPSIONAL ======
            Tidak otomatis dari @section('title').
            Muncul hanya jika halaman mendefinisikan @section('page_title') atau @section('page_header').
        --}}
        @if(View::hasSection('page_header'))
        @yield('page_header')
        @elseif(View::hasSection('page_title'))
        <section class="page-header p-4 p-md-5 mb-4">
            @hasSection('breadcrumb')
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb mb-1">@yield('breadcrumb')</ol>
            </nav>
            @endif
            <h1 class="h3 fw-bold mb-1">@yield('page_title')</h1>
            @hasSection('subtitle')
            <p class="text-muted mb-0">@yield('subtitle')</p>
            @endif
        </section>
        @endif


        {{-- ====== KONTEN HALAMAN ====== --}}
        @yield('content')
      </div>
    </main>

    {{-- FOOTER situs (punyamu) --}}
    @includeWhen(View::exists('public.footer'), 'public.footer')
  </div>

  {{-- JS --}}
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @stack('scripts')
</body>
</html>
