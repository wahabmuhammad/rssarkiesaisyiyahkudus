@extends('components.layouts.admin')
@section('title', ($mode ?? 'create') === 'edit' ? 'Edit Departemen/Poli' : 'Tambah Departemen/Poli')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .help{font-size:.85rem;color:#6b7280;}
  .icon-preview{width:48px;height:48px;border-radius:12px;display:grid;place-items:center;background:#f1f5f9;}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  $p = $dept ?? [
    'nama'=>'','ikon'=>'bi-hospital','deskripsi'=>'','gedung'=>'','lantai'=>'','urutan'=>'','status'=>'draft'
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode === 'edit' ? 'Edit Departemen/Poli' : 'Tambah Departemen/Poli' }}</h3>
  <a href="{{ route('admin.departments.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-8">
            <label class="form-label">Nama Poli</label>
            <input name="nama" value="{{ $p['nama'] }}" class="form-control" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ $p['urutan'] }}" class="form-control" min="1">
          </div>

          <div class="col-md-6">
            <label class="form-label d-flex justify-content-between">
              <span>Ikon (Bootstrap Icons)</span>
              <a href="https://icons.getbootstrap.com/" target="_blank" class="small">Lihat daftar ikon</a>
            </label>
            <div class="input-group">
              <span class="input-group-text bg-white"><i id="iconShow" class="bi {{ $p['ikon'] }}"></i></span>
              <input id="iconInput" name="ikon" value="{{ $p['ikon'] }}" class="form-control" placeholder="mis: bi-heart-pulse">
            </div>
            <div class="help mt-1">Masukkan nama class ikon (mis. <code>bi-heart-pulse</code>).</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" @selected($p['status']==='draft')>Draft</option>
              <option value="publish" @selected($p['status']==='publish')>Publish</option>
            </select>
          </div>

          <div class="col-12">
            <label class="form-label">Deskripsi Singkat</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Gambaran layanan singkat...">{{ $p['deskripsi'] }}</textarea>
          </div>

          <div class="col-md-6">
            <label class="form-label">Lokasi (Gedung)</label>
            <input name="gedung" value="{{ $p['gedung'] }}" class="form-control" placeholder="Gedung A / Utama">
          </div>
          <div class="col-md-6">
            <label class="form-label">Lokasi (Lantai)</label>
            <input name="lantai" value="{{ $p['lantai'] }}" class="form-control" placeholder="Lantai 2">
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="p-3 border rounded-3 bg-white h-100">
          <div class="d-flex align-items-center gap-3">
            <div class="icon-preview"><i id="iconBig" class="bi {{ $p['ikon'] }} fs-4"></i></div>
            <div>
              <div class="fw-semibold">Preview Ikon</div>
              <div class="help">Ikon akan tampil di listing & halaman detail.</div>
            </div>
          </div>
          <hr>
          <div class="help">Quick pick:</div>
          <div class="d-flex flex-wrap gap-2">
            @foreach(['bi-hospital','bi-heart-pulse','bi-ear','bi-eyedropper','bi-activity','bi-hospital-fill'] as $ic)
              <button type="button" class="btn btn-light btn-sm pick" data-icon="{{ $ic }}"><i class="bi {{ $ic }}"></i></button>
            @endforeach
          </div>
        </div>
      </div>
    </div> {{-- row --}}
  </div>

  <div class="card-footer d-flex gap-2 justify-content-end">
    <a href="{{ route('admin.departments.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-outline-primary" type="button">Simpan Draft</button>
    <button class="btn btn-primary" type="submit">Simpan</button>
    <button class="btn btn-success" type="button">Simpan & Publikasikan</button>
  </div>
</form>
@endsection

@push('scripts')
<script>
  const input=document.getElementById('iconInput');
  const show =document.getElementById('iconShow');
  const big  =document.getElementById('iconBig');
  function updateIcon(cls){ show.className='bi '+cls; big.className='bi '+cls+' fs-4'; input.value=cls; }
  input.addEventListener('input',()=>updateIcon(input.value.trim()));
  document.querySelectorAll('.pick').forEach(btn=>btn.addEventListener('click',()=>updateIcon(btn.dataset.icon)));
</script>
@endpush
