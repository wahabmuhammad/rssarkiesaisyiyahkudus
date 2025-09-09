@extends('components.layouts.admin')
@section('title', ($mode ?? 'create') === 'edit' ? 'Edit Dokter' : 'Tambah Dokter')

@push('head')
<style>
  .help{ font-size:.85rem; color:#6b7280; }
  .avatar-preview{ width:96px; height:96px; border-radius:14px; object-fit:cover; background:#f1f5f9; }
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  $d = $doctor ?? [
    'nama'=>'','gelar'=>'','npa'=>'','spesialis'=>'','subspesialis'=>'','departemen'=>[],
    'pengalaman'=>'','bahasa'=>[],'foto'=>'','bio'=>'','video'=>'','urutan'=>'',
    'status'=>'draft','slug'=>'','meta_title'=>'','meta_desc'=>'','centers'=>[]
  ];
  $departments = ['Poli Anak','Poli Kandungan','THT','Bedah','Penyakit Dalam','Geriatri'];
  $centers = ['Heart Center','Diabetes Center','Mother & Child','Orthopedic Center'];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode === 'edit' ? 'Edit Dokter' : 'Tambah Dokter' }}</h3>
  <a href="{{ route('admin.doctors.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="row g-3">
          <div class="col-md-8">
            <label class="form-label">Nama</label>
            <input name="nama" value="{{ $d['nama'] }}" class="form-control" required oninput="autoSlug()">
          </div>
          <div class="col-md-4">
            <label class="form-label">Gelar</label>
            <input name="gelar" value="{{ $d['gelar'] }}" class="form-control" placeholder="Sp.PD, Sp.OG, dsb">
          </div>
          <div class="col-md-6">
            <label class="form-label">NPA / SIP <span class="help">(opsional)</span></label>
            <input name="npa" value="{{ $d['npa'] }}" class="form-control" placeholder="SIP-xxxxx">
          </div>
          <div class="col-md-6">
            <label class="form-label">Pengalaman (tahun)</label>
            <input type="number" name="pengalaman" value="{{ $d['pengalaman'] }}" class="form-control" min="0">
          </div>
          <div class="col-md-6">
            <label class="form-label">Spesialis</label>
            <input name="spesialis" value="{{ $d['spesialis'] }}" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Subspesialis</label>
            <input name="subspesialis" value="{{ $d['subspesialis'] }}" class="form-control">
          </div>
          <div class="col-12">
            <label class="form-label">Departemen / Poli <span class="help">(multi-select)</span></label>
            <select name="departemen[]" class="form-select" multiple size="4">
              @foreach($departments as $dep)
                <option value="{{ $dep }}" @selected(in_array($dep, $d['departemen']))>{{ $dep }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Bahasa <span class="help">(pisahkan dengan koma)</span></label>
            <input name="bahasa" value="{{ implode(', ', $d['bahasa']) }}" class="form-control" placeholder="Indonesia, Inggris">
          </div>
          <div class="col-12">
            <label class="form-label">Biografi Singkat</label>
            <textarea name="bio" class="form-control" rows="4">{{ $d['bio'] }}</textarea>
          </div>
          <div class="col-md-6">
            <label class="form-label">Link Video/Profile <span class="help">(opsional)</span></label>
            <input type="url" name="video" value="{{ $d['video'] }}" class="form-control" placeholder="https://…">
          </div>
          <div class="col-md-3">
            <label class="form-label">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ $d['urutan'] }}" class="form-control" min="1">
          </div>
          <div class="col-md-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" @selected($d['status']==='draft')>Draft</option>
              <option value="publish" @selected($d['status']==='publish')>Publish</option>
            </select>
          </div>
        </div>

        <hr class="my-4">
        <h6 class="mb-3">SEO</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Slug</label>
            <input name="slug" id="slug" value="{{ $d['slug'] }}" class="form-control" placeholder="dr-a-setiawan-sp-pd">
            <div class="help">Terbentuk otomatis dari nama, bisa diubah.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Meta Title</label>
            <input name="meta_title" value="{{ $d['meta_title'] }}" class="form-control">
          </div>
          <div class="col-12">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_desc" class="form-control" rows="2">{{ $d['meta_desc'] }}</textarea>
          </div>
        </div>

        <hr class="my-4">
        <h6 class="mb-3">Relasi</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Center of Excellence</label>
            <select name="centers[]" class="form-select" multiple size="4">
              @foreach($centers as $c)
                <option value="{{ $c }}" @selected(in_array($c, $d['centers']))>{{ $c }}</option>
              @endforeach
            </select>
            <div class="help mt-1">Tambah CoE? <a href="{{ route('admin.centers.index') }}">Kelola CoE</a></div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Map ke Jadwal</label>
            <div class="form-text mb-2">Penjadwalan dilakukan di modul Jadwal.</div>
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-outline-primary">
              <i class="bi bi-link-45deg me-1"></i> Buka Modul Jadwal
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="p-3 border rounded-3 bg-white">
          <label class="form-label">Foto Dokter</label>
          <div class="d-flex align-items-center gap-3">
            <img id="preview" src="{{ $d['foto'] ?: 'https://via.placeholder.com/96x96?text=Foto' }}" class="avatar-preview" alt="">
            <div>
              <input type="file" name="foto" accept="image/*" class="form-control form-control-sm" onchange="readImg(this)">
              <div class="help mt-1">PNG/JPG &lt; 1MB. Rasio persegi disarankan.</div>
            </div>
          </div>
        </div>
      </div>

    </div> {{-- row --}}
  </div>

  <div class="card-footer d-flex gap-2 justify-content-end">
    <a href="{{ route('admin.doctors.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-outline-primary" type="button">Simpan Draft</button>
    <button class="btn btn-primary" type="submit">Simpan</button>
    <button class="btn btn-success" type="button">Simpan & Publikasikan</button>
  </div>
</form>
@endsection

@push('scripts')
<script>
  function slugify(str){return String(str).toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'').replace(/[^a-z0-9]+/g,'-').replace(/(^-|-$)/g,'');}
  function autoSlug(){
    const nama=document.querySelector('input[name="nama"]').value;
    const gelar=document.querySelector('input[name="gelar"]').value;
    document.getElementById('slug').value = slugify(nama + (gelar ? ' ' + gelar : ''));
  }
  function readImg(input){
    if(!input.files?.length) return;
    document.getElementById('preview').src = URL.createObjectURL(input.files[0]);
  }
</script>
@endpush
