<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Placeholder' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="p-5">
  <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary mb-3">
    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
  </a>
  <h1 class="h4 mb-2">{{ $title ?? 'Halaman ini masih kosong' }}</h1>
  <p class="text-muted">Silakan implementasi sesuai kebutuhan.</p>
</body>
</html>
