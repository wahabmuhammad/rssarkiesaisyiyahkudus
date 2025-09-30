{{-- resources/views/rawat-inap/sidebar.blade.php --}}
@php
  // Item: slug + label + (opsional) named route. Fallback URL: /rawat-inap/{slug}
  $items = [
    ['slug' => 'vip-a',   'label' => 'VIP A',   'route' => 'rawat-inap.vip-a',   'url' => url('/rawat-inap/vip-a')],
    ['slug' => 'vip-b',   'label' => 'VIP B',   'route' => 'rawat-inap.vip-b',   'url' => url('/rawat-inap/vip-b')],
    ['slug' => 'kelas-1', 'label' => 'Kelas 1', 'route' => 'rawat-inap.kelas-1', 'url' => url('/rawat-inap/kelas-1')],
    ['slug' => 'kelas-2', 'label' => 'Kelas 2', 'route' => 'rawat-inap.kelas-2', 'url' => url('/rawat-inap/kelas-2')],
    ['slug' => 'kelas-3', 'label' => 'Kelas 3', 'route' => 'rawat-inap.kelas-3', 'url' => url('/rawat-inap/kelas-3')],
    ['slug' => 'icu-nicu','label' => 'ICU / NICU','route' => 'rawat-inap.icu-nicu','url' => url('/rawat-inap/icu-nicu')],
    ['slug' => 'peristi', 'label' => 'Peristi', 'route' => 'rawat-inap.peristi', 'url' => url('/rawat-inap/peristi')],
  ];

  $currentRoute = optional(request()->route())->getName();
  $currentPath  = trim(request()->path(), '/'); // contoh: 'rawat-inap/kelas-1'
@endphp

<div class="coe-left">
  <div class="p-3 border-bottom">
    <div class="fw-bold">Semua Fasilitas Rawat Inap</div>
  </div>

  <div class="list-group list-group-flush">
    @foreach ($items as $it)
      @php
        $slug  = $it['slug'];
        $route = $it['route'] ?? null;

        // Pakai named route kalau ada; fallback ke URL statis
        $href = ($route && Route::has($route)) ? route($route) : ($it['url'] ?? url('/rawat-inap/'.$slug));

        // Aktif jika nama route cocok ATAU path cocok
        $isActive =
          ($route && request()->routeIs($route)) ||
          $currentPath === 'rawat-inap/'.$slug || strpos($currentPath, 'rawat-inap/'.$slug.'/') === 0 ||
          $currentPath === $slug              || strpos($currentPath, $slug.'/') === 0;
      @endphp

      <a href="{{ $href }}"
         class="list-group-item list-group-item-action {{ $isActive ? 'active' : '' }}">
        {!! $it['label'] !!}
      </a>
    @endforeach
  </div>
</div>
