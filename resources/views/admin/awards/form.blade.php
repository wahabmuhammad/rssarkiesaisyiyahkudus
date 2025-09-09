@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit Penghargaan' : 'Tambah Penghargaan')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .help{font-size:.85rem;color:#6b7280}
  .logo-prev{width:100%;max-height:200px;object-fit:contain;border:1px solid #e5e7eb;border-radius:12px;background:#fff}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  $x = $award ?? [
    'name'=>'','year'=>now()->year,'org'=>'','logo'=>'','cert'=>'','order'=>1,'status'=>'draft'
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit Penghargaan/Akreditasi' : 'Tambah Penghargaan/Akreditasi' }}</h3>
  <a href="{{ route('admin.awards.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="mb-3">
          <label class="form-label">Nama Penghargaan/Akreditasi</label>
          <input name="name" class="form-control" value="{{ $x['name'] }}" required>
        </div>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" value="{{ $x['year'] }}" min="1900" max="{{ now()->year+1 }}">
          </div>
          <div class="col-md-8">
            <label class="form-label">Penyelenggara</label>
            <input name="org" class="form-control" value="{{ $x['org'] }}" placeholder="KARS / Kemenkes / dsb">
          </div>
        </div>

        <div class="row g-3 mt-1">
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" @selected($x['status']==='draft')>Draft</option>
              <option value="publish" @selected($x['status']==='publish')>Publish</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Urutan Tampil</label>
            <input type="number" name="order" class="form-control" min="1" value="{{ $x['order'] }}">
          </div>
        </div>

        <div class="mt-3">
          <label class="form-label">Tautan Sertifikat (PDF)</label>
          <input name="cert" value="{{ $x['cert'] }}" class="form-control" placeholder="URL pdf atau unggah file di bawah">
          <div class="help mt-1">Jika menggunakan storage lokal, isi URL dari file PDF yang diunggah.</div>
          <div class="input-group mt-2">
            <span class="input-group-text"><i class="bi bi-file-earmark-pdf"></i></span>
            <input type="file" class="form-control" accept="application/pdf" id="certFile">
          </div>
          <div class="help">*Demo: file belum disimpan; nama file hanya ditampilkan.</div>
          <div id="certName" class="small text-muted mt-1"></div>
        </div>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Logo</label>
        <input type="file" accept="image/*" id="logoInp" class="form-control">
        <img id="logoPrev" src="{{ $x['logo'] }}" class="logo-prev mt-2" onerror="this.style.display='none'">
        <div class="help mt-1">Format: PNG/JPG/SVG/WebP. Rasio horizontal disarankan.</div>
      </div>
    </div>
  </div>

  <div class="card-footer d-flex justify-content-end gap-2">
    <a href="{{ route('admin.awards.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-outline-primary" type="button">Simpan Draft</button>
    <button class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script>
  // preview logo
  document.getElementById('logoInp').addEventListener('change', e=>{
    const f=e.target.files?.[0]; if(!f) return;
    const url=URL.createObjectURL(f);
    const img=document.getElementById('logoPrev'); img.src=url; img.style.display='block';
  });
  // tampilkan nama file pdf (demo)
  document.getElementById('certFile').addEventListener('change', e=>{
    const f=e.target.files?.[0]; document.getElementById('certName').textContent = f ? 'Dipilih: '+f.name : '';
  });
</script>
@endpush
