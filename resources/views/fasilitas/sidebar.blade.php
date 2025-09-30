{{-- resources/views/fasilitas/sidebar.blade.php --}}
@php
  // Pakai nama route persis seperti di web.php (tanpa prefix "fasilitas.")
  $items = [
    ['slug' => 'diagnostic-center',              'label' => 'Diagnostic Center',                 'route' => 'diagnostic-center',              'url' => url('/diagnostic-center')],
    ['slug' => 'healthy-corner',                 'label' => 'Healthy Corner',                    'route' => 'healthy-corner',                 'url' => url('/healthy-corner')],
    ['slug' => 'intensive-care',                 'label' => 'Intensive Care',                    'route' => 'intensive-care',                 'url' => url('/intensive-care')],
    ['slug' => 'rehabilitasi', 'label' => 'Rehabilitasi Medik & Fisioterapi',  'route' => 'rehabilitasi-medik-fisioterapi', 'url' => url('/rehabilitasi')],
    ['slug' => 'farmasi',                        'label' => 'Farmasi',                           'route' => 'farmasi',                        'url' => url('/farmasi')],
    ['slug' => 'emergency',                      'label' => 'Emergency',                         'route' => 'emergency',                      'url' => url('/emergency')],
  ];

  $currentRoute = optional(request()->route())->getName();
  $currentPath  = trim(request()->path(), '/');
@endphp

<div class="coe-left">
  <div class="p-3 border-bottom">
    <div class="fw-bold">Semua Fasilitas & Layanan</div>
  </div>

  <div class="list-group list-group-flush">
    @foreach ($items as $it)
      @php
        $slug  = $it['slug'];
        $route = $it['route'] ?? null;

        // Pakai named route jika ada; fallback ke URL statis
        $href = ($route && Route::has($route)) ? route($route) : ($it['url'] ?? url('/'.$slug));

        // Tandai aktif kalau nama route cocok ATAU path cocok
        $isActive =
          ($route && request()->routeIs($route)) ||
          $currentPath === $slug || strpos($currentPath, $slug.'/') === 0;
      @endphp

      <a href="{{ $href }}"
         class="list-group-item list-group-item-action {{ $isActive ? 'active' : '' }}">
        {!! $it['label'] !!}
      </a>
    @endforeach
  </div>
</div>
