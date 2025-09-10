<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'RS Sarkies' }}</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  @stack('head')
</head>
<body>
  {{-- HEADER selalu tampil --}}
  @include('public.header')

  {{-- KONTEN HALAMAN dari komponen/halaman pemanggil --}}
  {{ $slot }}

  {{-- FOOTER selalu tampil --}}
  @include('public.footer')

  {{-- JS --}}
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @stack('scripts')
</body>
</html>
