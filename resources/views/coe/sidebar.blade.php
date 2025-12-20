{{-- resources/views/coe/sidebar.blade.php --}}
@php
  $items = [
    ['slug' => 'skin-aesthetic',    'label' => 'Skin & Aesthetic Clinic',                 'url' => url('/coe/skin-aesthetic')],
    ['slug' => 'orthopedic-centre', 'label' => 'Orthopedic Centre',                       'url' => url('/coe/orthopedic-centre')],
    ['slug' => 'klinik-kandungan',  'label' => 'Klinik Kandungan', 'route' => 'klinik-kandungan', 'url' => url('/coe/klinik-kandungan')],
    ['slug' => 'pain-center',       'label' => 'Pain Clinic', 'route' => 'pain-center',    'url' => url('/coe/pain-center')],
  ];

  $currentRoute = optional(request()->route())->getName();
  $currentPath  = trim(request()->path(), '/');
@endphp

<div class="coe-left">
  <div class="p-3 border-bottom">
    <div class="fw-bold">Semua Layanan Unggulan</div>
  </div>

  <div class="list-group list-group-flush">
    @foreach ($items as $it)
      @php
        $slug  = $it['slug'];
        $route = $it['route'] ?? null;

        $href = ($route && Route::has($route)) ? route($route) : ($it['url'] ?? url('/coe/'.$slug));

        $isActive =
          ($route && request()->routeIs($route)) ||
          $currentPath === 'coe/'.$slug || strpos($currentPath, 'coe/'.$slug.'/') === 0 ||
          $currentPath === $slug        || strpos($currentPath, $slug.'/') === 0;
      @endphp

      <a href="{{ $href }}"
         class="list-group-item list-group-item-action {{ $isActive ? 'active' : '' }}">
        {!! $it['label'] !!}
      </a>
    @endforeach
  </div>
</div>
