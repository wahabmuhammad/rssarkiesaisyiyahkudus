@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit Layanan' : 'Tambah Layanan')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .help{font-size:.85rem;color:#6b7280}
  .img-prev{width:100%;max-height:220px;object-fit:cover;border:1px solid #e5e7eb;border-radius:12px}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  $x = $center ?? [
    'name'=>'','icon'=>'bi-stars','image'=>'','desc'=>'',
    'doctor_ids'=>[],'departments'=>[],'cta_text'=>'','cta_link'=>'',
    'order'=>1
  ];
  // contoh sumber pilihan
  $doctors = [
    ['id'=>1,'name'=>'dr. A. Setiawan, Sp.PD'],
    ['id'=>2,'name'=>'dr. B. Kartika, Sp.OG'],
    ['id'=>3,'name'=>'dr. C. Rahman, Sp.THT'],
    ['id'=>4,'name'=>'dr. D. Sari, Sp.A'],
  ];
  $departments = ['Penyakit Dalam','Kandungan','THT','Anak','Bedah'];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit Layanan' : 'Tambah Layanan' }}</h3>
  <a href="{{ route('admin.centers.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="mb-3">
          <label class="form-label">Nama Layanan</label>
          <input name="name" class="form-control" value="{{ $x['name'] }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea name="desc" rows="4" class="form-control" placeholder="Gambaran singkat layanan…">{{ $x['desc'] }}</textarea>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Ikon (Bootstrap Icons)</label>
            <div class="input-group">
              <span class="input-group-text bg-white"><i id="iconShow" class="bi {{ $x['icon'] }}"></i></span>
              <input id="iconInput" name="icon" class="form-control" value="{{ $x['icon'] }}" placeholder="mis. bi-activity">
            </div>
            <div class="help mt-1">Opsional. Jika mengisi ikon, gambar boleh dikosongkan.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Urutan Tampil</label>
            <input type="number" name="order" class="form-control" min="1" value="{{ $x['order'] }}">
          </div>
        </div>

        <div class="row g-3 mt-1">
          <div class="col-md-6">
            <label class="form-label">CTA Text</label>
            <input name="cta_text" class="form-control" value="{{ $x['cta_text'] }}" placeholder="mis. Buat Janji">
          </div>
          <div class="col-md-6">
            <label class="form-label">CTA Link</label>
            <input name="cta_link" class="form-control" value="{{ $x['cta_link'] }}" placeholder="https:// atau /path">
          </div>
        </div>

        <div class="row g-3 mt-1">
          <div class="col-md-6">
            <label class="form-label">Map ke Dokter</label>
            <select name="doctor_ids[]" multiple size="6" class="form-select">
              @foreach($doctors as $d)
                <option value="{{ $d['id'] }}" @selected(in_array($d['id'],$x['doctor_ids']))>{{ $d['name'] }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Map ke Poli</label>
            <select name="departments[]" multiple size="6" class="form-select">
              @foreach($departments as $p)
                <option value="{{ $p }}" @selected(in_array($p,$x['departments']))>{{ $p }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Gambar (opsional)</label>
        <input type="file" accept="image/*" id="imgInp" class="form-control">
        <img id="imgPrev" src="{{ $x['image'] }}" class="img-prev mt-2" onerror="this.style.display='none'">
        <div class="help mt-1">Jika mengunggah gambar, bisa mengabaikan ikon.</div>

        <div class="mt-3">
          <div class="help">Quick pick ikon:</div>
          <div class="d-flex flex-wrap gap-2 mt-1">
            @foreach(['bi-activity','bi-heart-pulse','bi-ear','bi-stars','bi-hospital','bi-emoji-smile'] as $ic)
              <button type="button" class="btn btn-light btn-sm pick" data-icon="{{ $ic }}"><i class="bi {{ $ic }}"></i></button>
            @endforeach
          </div>
        </div>
      </div>
    </div> {{-- row --}}
  </div>

  <div class="card-footer d-flex justify-content-end gap-2">
    <a href="{{ route('admin.centers.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script>
  // preview image
  document.getElementById('imgInp').addEventListener('change', e=>{
    const f=e.target.files?.[0]; if(!f) return;
    const url=URL.createObjectURL(f);
    const img=document.getElementById('imgPrev'); img.src=url; img.style.display='block';
  });
  // icon picker
  const iconInput=document.getElementById('iconInput'), iconShow=document.getElementById('iconShow');
  function setIcon(cls){ iconInput.value=cls; iconShow.className='bi '+cls; }
  document.querySelectorAll('.pick').forEach(b=>b.onclick=()=>setIcon(b.dataset.icon));
  iconInput.addEventListener('input',()=>setIcon(iconInput.value.trim()));
</script>
@endpush
