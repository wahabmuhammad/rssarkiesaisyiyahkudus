@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit Promo' : 'Tambah Promo')

@push('head')
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .banner-wrap{border:1px dashed #bfdbfe;background:#f8fafc;border-radius:14px;padding:14px;display:flex;gap:14px;align-items:center}
  .banner-wrap img{width:260px;height:130px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb;background:#fff}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  // defaults + override
  $x = array_merge([
    'title'=>'',
    'banner'=>asset('assets/img/sample/placeholder-wide.png'),
    'desc_html'=>'',
  ], $promo ?? []);
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit Promo' : 'Tambah Promo' }}</h3>
  <a href="{{ route('admin.promos.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" onsubmit="return collectPromo()">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-7">
        <label class="form-label">Judul Promo</label>
        <input name="title" class="form-control" value="{{ $x['title'] }}" placeholder="Contoh: Diskon MCU 20%" required>

        <div class="mt-3">
          <div class="d-flex justify-content-between align-items-center">
            <label class="form-label mb-2">Deskripsi / Penjelasan</label>
            <small class="text-muted">Rich text (bisa list, link, dll).</small>
          </div>
          <div id="editorDesc" style="height:260px;background:#fff;"></div>
          <input type="hidden" name="desc_html" id="descHidden">
        </div>
      </div>

      <div class="col-lg-5">
        <label class="form-label mb-2">Banner</label>
        <div class="banner-wrap">
          <img id="bannerPreview" src="{{ $x['banner'] }}" alt="Banner">
          <div class="flex-fill">
            <input type="file" name="banner_file" accept="image/*" class="form-control" id="bannerFile">
            <div class="form-text">Saran ukuran 1200×600px (JPG/PNG/WebP).</div>
            <input type="url" name="banner" class="form-control mt-2" value="{{ $x['banner'] }}" id="bannerUrl" placeholder="atau tempel URL gambar">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card-footer d-flex justify-content-end gap-2">
    <a href="{{ route('admin.promos.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
  // Quill editor
  const toolbar=[[{ header:[false,3,4] }],['bold','italic','underline'],[{list:'ordered'},{list:'bullet'}],['link'],['clean']];
  const qDesc = new Quill('#editorDesc',{ theme:'snow', modules:{ toolbar }, placeholder:'Tulis deskripsi promo…' });
  qDesc.clipboard.dangerouslyPasteHTML(@json($x['desc_html'] ?? ''));

  // preview banner (file & url)
  const fileInput = document.getElementById('bannerFile');
  const urlInput  = document.getElementById('bannerUrl');
  const preview   = document.getElementById('bannerPreview');

  fileInput.addEventListener('change', e=>{
    const f = e.target.files?.[0];
    if(!f) return;
    const r = new FileReader();
    r.onload = ev => { preview.src = ev.target.result; urlInput.value = ''; };
    r.readAsDataURL(f);
  });

  urlInput.addEventListener('input', e=>{
    if(e.target.value) preview.src = e.target.value;
  });

  function collectPromo(){
    document.getElementById('descHidden').value = qDesc.root.innerHTML.trim();
    return true;
  }
</script>
@endpush
