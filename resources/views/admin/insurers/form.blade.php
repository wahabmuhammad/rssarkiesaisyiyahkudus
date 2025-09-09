@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit Mitra Asuransi' : 'Tambah Mitra Asuransi')

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
  $i = $insurer ?? [
    'name'=>'','group'=>'BPJS','logo'=>'','url'=>'','contact'=>'','status'=>'aktif','order'=>1
  ];
  $groups = ['BPJS','Swasta'];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit Mitra Asuransi' : 'Tambah Mitra Asuransi' }}</h3>
  <a href="{{ route('admin.insurers.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="mb-3">
          <label class="form-label">Nama Perusahaan</label>
          <input name="name" class="form-control" value="{{ $i['name'] }}" required>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Grup</label>
            <select name="group" class="form-select">
              @foreach($groups as $g)
                <option value="{{ $g }}" @selected($i['group']===$g)>{{ $g }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Urutan Tampil</label>
            <input type="number" name="order" class="form-control" min="1" value="{{ $i['order'] }}">
          </div>
        </div>

        <div class="row g-3 mt-1">
          <div class="col-md-8">
            <label class="form-label">URL</label>
            <input name="url" class="form-control" value="{{ $i['url'] }}" placeholder="https://...">
          </div>
          <div class="col-md-4">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="aktif" @selected($i['status']==='aktif')>Aktif</option>
              <option value="nonaktif" @selected($i['status']==='nonaktif')>Nonaktif</option>
            </select>
          </div>
        </div>

        <div class="mt-3">
          <label class="form-label">Kontak (opsional)</label>
          <input name="contact" class="form-control" value="{{ $i['contact'] }}" placeholder="Telepon/Email/WhatsApp">
        </div>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Logo</label>
        <input type="file" accept="image/*" id="logoInp" class="form-control">
        <img id="logoPrev" src="{{ $i['logo'] }}" class="logo-prev mt-2" onerror="this.style.display='none'">
        <div class="help mt-1">PNG/JPG/SVG/WebP. Rasio horizontal disarankan.</div>
      </div>
    </div>
  </div>

  <div class="card-footer d-flex justify-content-end gap-2">
    <a href="{{ route('admin.insurers.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script>
  document.getElementById('logoInp').addEventListener('change', e=>{
    const f=e.target.files?.[0]; if(!f) return;
    const url=URL.createObjectURL(f);
    const img=document.getElementById('logoPrev'); img.src=url; img.style.display='block';
  });
</script>
@endpush
