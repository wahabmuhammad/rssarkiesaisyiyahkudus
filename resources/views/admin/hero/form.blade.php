@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit Slide Hero' : 'Tambah Slide Hero')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .cover-preview{width:100%;max-height:260px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb}
  .help{font-size:.85rem;color:#6b7280}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  $s = $slide ?? [
    'title'=>'','desc'=>'','cta_text'=>'','cta_link'=>'',
    'order'=>1,'status'=>'draft','start_at'=>now()->format('Y-m-d'),
    'end_at'=>now()->addMonth()->format('Y-m-d'),'image'=>''
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit Slide' : 'Tambah Slide' }}</h3>
  <a href="{{ route('admin.hero.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="mb-3">
          <label class="form-label">Judul</label>
          <input name="title" value="{{ $s['title'] }}" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi Singkat</label>
          <textarea name="desc" class="form-control" rows="3" placeholder="Maksimal 1–2 kalimat.">{{ $s['desc'] }}</textarea>
        </div>
        <div class="row g-3">
          <div class="col-md-5">
            <label class="form-label">Teks CTA</label>
            <input name="cta_text" value="{{ $s['cta_text'] }}" class="form-control" placeholder="Contoh: Daftar Sekarang">
          </div>
          <div class="col-md-7">
            <label class="form-label">Link CTA</label>
            <input name="cta_link" value="{{ $s['cta_link'] }}" class="form-control" placeholder="https://... atau /path">
          </div>
        </div>
        <div class="mb-3 mt-3">
          <label class="form-label">Gambar (Hero)</label>
          <input type="file" accept="image/*" class="form-control" id="imgInp">
          <img id="imgPrev" src="{{ $s['image'] }}" class="cover-preview mt-2" onerror="this.style.display='none'">
          <div class="help mt-1">Rekomendasi 1600×600px, JPG/PNG/WebP &lt; 500KB.</div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Urutan</label>
            <input type="number" name="order" value="{{ $s['order'] }}" class="form-control" min="1">
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" @selected($s['status']==='draft')>Draft</option>
              <option value="publish" @selected($s['status']==='publish')>Publish</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Periode Tayang</label>
            <div class="d-flex gap-2">
              <input type="date" name="start_at" value="{{ $s['start_at'] }}" class="form-control">
              <input type="date" name="end_at" value="{{ $s['end_at'] }}" class="form-control">
            </div>
            <div class="help mt-1">Slide hanya tampil di rentang tanggal ini.</div>
          </div>
        </div>
      </div>
    </div> {{-- row --}}
  </div>

  <div class="card-footer d-flex gap-2 justify-content-end">
    <a href="{{ route('admin.hero.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-outline-primary" type="button">Simpan Draft</button>
    <button class="btn btn-primary" type="submit">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script>
  document.getElementById('imgInp').addEventListener('change', e=>{
    const f = e.target.files?.[0]; if(!f) return;
    const url = URL.createObjectURL(f);
    const img = document.getElementById('imgPrev'); img.src = url; img.style.display='block';
  });
</script>
@endpush
