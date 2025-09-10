@extends('components.layouts.admin')
@section('title','Berita & Artikel')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .badge-status{border-radius:999px;padding:.25rem .55rem;font-weight:600}
  .status-draft{background:#FFF4E5;color:#B54708}
  .status-scheduled{background:#E8F3FF;color:#175CD3}
  .status-published{background:#E7F8EE;color:#18824A}
  .chip{background:#f1f5f9;border:1px solid #e5e7eb;border-radius:999px;padding:.15rem .45rem;margin-right:.25rem}
  .cover-xs{width:56px;height:40px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb}
</style>
@endpush

@section('content')
@php
  // ===== DEMO DATA (nanti ganti dari controller) =====
  $articles = $articles ?? [
    ['id'=>1,'title'=>'Promo MCU September','category'=>'Pengumuman','tags'=>['promo','mcu'],'author'=>'Humas RS','publish_at'=>now()->subDay()->toDateTimeString(),'status'=>'published','home'=>true,'featured'=>true,'pinned'=>false,'cover'=>'https://picsum.photos/seed/a/100/70'],
    ['id'=>2,'title'=>'Tips Kesehatan Anak','category'=>'Kesehatan','tags'=>['anak','tips'],'author'=>'dr. D. Sari','publish_at'=>now()->addDay()->toDateTimeString(),'status'=>'scheduled','home'=>true,'featured'=>false,'pinned'=>true,'cover'=>'https://picsum.photos/seed/b/100/70'],
    ['id'=>3,'title'=>'Cegah ISPA saat Hujan','category'=>'Kesehatan','tags'=>['ispa'],'author'=>'dr. C. Rahman','publish_at'=>now()->toDateTimeString(),'status'=>'draft','home'=>false,'featured'=>false,'pinned'=>false,'cover'=>'https://picsum.photos/seed/c/100/70'],
  ];
  $categories = ['Kesehatan','Pengumuman','Kegiatan'];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Berita & Artikel</h3>
    <div class="text-muted">Kelola konten, jadwal tayang, SEO, dan penempatan beranda.</div>
  </div>
  <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tulis Artikel
  </a>
</div>

<div class="card card-soft mb-3">
  <div class="card-body">
    <form class="row g-2">
      <div class="col-md-4">
        <input type="search" class="form-control" placeholder="Cari judul/konten…">
      </div>
      <div class="col-md-2">
        <select class="form-select">
          <option value="">Semua Kategori</option>
          @foreach($categories as $c) <option>{{ $c }}</option> @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <select class="form-select">
          <option value="">Semua Status</option>
          <option value="draft">Draft</option>
          <option value="scheduled">Scheduled</option>
          <option value="published">Published</option>
        </select>
      </div>
      <div class="col-md-2">
        <input type="date" class="form-control">
      </div>
      <div class="col-md-2">
        <button class="btn btn-outline-secondary w-100">Filter</button>
      </div>
    </form>
  </div>
</div>

<div class="card card-soft">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th style="width:32px"><input type="checkbox" id="chkAll"></th>
            <th>Judul</th>
            <th>Kategori / Tag</th>
            <th>Penulis</th>
            <th>Tayang</th>
            <th>Status</th>
            <th>Home</th>
            <th>Featured</th>
            <th>Pinned</th>
            <th style="width:120px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($articles as $a)
            <tr>
              <td><input type="checkbox" class="chkRow"></td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ $a['cover'] }}" class="cover-xs" alt="">
                  <div>
                    <div class="fw-semibold">{{ $a['title'] }}</div>
                    <div class="text-muted small">{{ Str::limit('…', 0) }}</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="small">{{ $a['category'] }}</div>
                <div class="small">
                  @foreach($a['tags'] as $t)<span class="chip">{{ $t }}</span>@endforeach
                </div>
              </td>
              <td class="small">{{ $a['author'] }}</td>
              <td class="small">{{ \Carbon\Carbon::parse($a['publish_at'])->format('d M Y H:i') }}</td>
              <td>
                <span class="badge-status status-{{ $a['status'] }}">{{ strtoupper($a['status']) }}</span>
              </td>
              <td>{!! $a['home'] ? '<i class="bi bi-check2-circle text-success"></i>' : '<i class="bi bi-dash text-muted"></i>' !!}</td>
              <td>{!! $a['featured'] ? '<i class="bi bi-star-fill text-warning"></i>' : '<i class="bi bi-star text-muted"></i>' !!}</td>
              <td>{!! $a['pinned'] ? '<i class="bi bi-pin-angle-fill text-primary"></i>' : '<i class="bi bi-pin-angle text-muted"></i>' !!}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <a class="btn btn-outline-primary" href="{{ route('admin.articles.edit', $a['id']) }}"><i class="bi bi-pencil"></i></a>
                  <button class="btn btn-outline-secondary"><i class="bi bi-upload"></i></button>
                  <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-2">
      <div class="btn-group btn-group-sm">
        <button class="btn btn-outline-primary">Publish</button>
        <button class="btn btn-outline-secondary">Set Schedule</button>
        <button class="btn btn-outline-warning">Set Draft</button>
        <button class="btn btn-outline-danger">Hapus</button>
      </div>
      <nav class="small text-muted">1–10 dari 10</nav>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.getElementById('chkAll').addEventListener('change', e=>{
    document.querySelectorAll('.chkRow').forEach(c=>c.checked=e.target.checked);
  });
</script>
@endpush
