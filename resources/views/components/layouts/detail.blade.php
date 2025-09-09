@props([
  'title',
  'subtitle'      => null,
  'hero'          => null,
  'heroMinHeight' => 'clamp(220px, 28vh, 360px)',
  'aboutTitle'    => null,
  'about'         => null,
  'facilities'    => [],
  'spec'          => [],
  'gallery'       => [],
  'galleryNote'   => '*Gambar bersifat ilustrasi, detail dapat berbeda di lokasi.',
  'supporting'    => [],
])

<main id="main">
  {{-- HERO --}}
  <section class="position-relative d-flex align-items-center justify-content-center text-white"
           style="min-height: {{ $heroMinHeight }};
                  background: url('{{ $hero }}') center/cover no-repeat;">
    <span class="position-absolute top-0 start-0 w-100 h-100"
          style="background: linear-gradient(180deg, rgba(0,0,0,.35), rgba(0,0,0,.35));"></span>

    <div class="container position-relative text-center py-4 py-md-5">
      <h1 class="fw-bold mb-1" style="font-size:clamp(1.125rem, 4.2vw, 2.25rem);">{{ $title }}</h1>
      @if($subtitle)
        <p class="mb-0" style="font-size:clamp(.875rem, 3.2vw, 1.125rem);opacity:.9">{{ $subtitle }}</p>
      @endif
    </div>
  </section>

  {{-- CONTENT --}}
  <section class="py-4 py-md-5">
    <div class="container">

      @if($aboutTitle || $about)
        <h3 class="fw-bold">{{ $aboutTitle }}</h3>
        @if($about){!! $about !!}@endif
      @endif

      @if(count($facilities) || count($spec))
        <div class="row g-3 g-sm-4 mt-2 align-items-stretch">
          @if(count($facilities))
          <div class="col-12 col-lg-6">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <h3 class="h5 fw-bold mb-3">Fasilitas Unggulan</h3>
                <ul class="mb-0 ps-3">
                  @foreach($facilities as $item)
                    <li class="mb-1">{{ $item }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          @endif

          @if(count($spec))
          <div class="col-12 col-lg-6">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body">
                <h3 class="h5 fw-bold mb-3">Spesifikasi Kamar</h3>
                <div class="table-responsive">
                  <table class="table table-striped align-middle mb-0">
                    <tbody>
                      @foreach($spec as $row)
                        <tr>
                          <th class="w-50">{{ $row[0] ?? '' }}</th>
                          <td>{{ $row[1] ?? '' }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
      @endif

      @if(count($gallery))
        <div class="mt-4 mt-md-5">
          <h3 class="h5 fw-bold">Galeri</h3>
          <div class="row g-2 g-sm-3">
            @foreach($gallery as $img)
              @php
                $src = is_array($img) ? ($img['src'] ?? '') : $img;
                $alt = is_array($img) ? ($img['alt'] ?? $title) : $title;
              @endphp
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                  <img src="{{ $src }}" alt="{{ $alt }}" class="card-img-top img-fluid" loading="lazy">
                </div>
              </div>
            @endforeach
          </div>
          @if($galleryNote)
            <p class="text-muted small mt-2 mb-0">{{ $galleryNote }}</p>
          @endif
        </div>
      @endif

      @if(count($supporting))
        <hr class="my-5">
        <h3 class="h5 fw-bold">Layanan Penunjang</h3>
        <ul class="mb-0 ps-3">
          @foreach($supporting as $item)
            <li class="mb-1">{{ $item }}</li>
          @endforeach
        </ul>
      @endif

      @if(trim((string) $slot) !== '')
        <div class="mt-5">
          {{ $slot }}
        </div>
      @endif

    </div>
  </section>
</main>
