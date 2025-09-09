@extends('components.layouts.admin')
@section('title','Dokter')

@push('head')
<style>
  .filter-chip{ background:#fff; border:1px solid #e5e7eb; border-radius:999px; padding:.35rem .6rem; }
  .badge-status{ border-radius:999px; padding:.35rem .6rem; font-weight:600; }
  .badge-status.publish{ background:#E7F8EE; color:#18824a; }
  .badge-status.draft{ background:#FFE8E8; color:#b42318; }
  .drag-handle{ cursor:grab; color:#64748b; }
  .draggable.dragging{ opacity:.6; }
</style>
@endpush

@section('content')
  @php
    $departments = ['Poli Anak','Poli Kandungan','THT','Bedah','Penyakit Dalam','Geriatri'];
    $doctors = $doctors ?? [
      ['id'=>1,'nama'=>'dr. A. Setiawan','gelar'=>'Sp.PD','spesialis'=>'Penyakit Dalam','sub'=>'Geriatri','departemen'=>['Penyakit Dalam','Geriatri'],'pengalaman'=>12,'bahasa'=>['ID','EN'],'status'=>'publish','urutan'=>1],
      ['id'=>2,'nama'=>'dr. B. Kartika','gelar'=>'Sp.OG','spesialis'=>'Obgyn','sub'=>'Maternal Fetal','departemen'=>['Kandungan'],'pengalaman'=>9,'bahasa'=>['ID'],'status'=>'draft','urutan'=>2],
      ['id'=>3,'nama'=>'dr. C. Rahman','gelar'=>'Sp.THT-KL','spesialis'=>'THT','sub'=>'Otologi','departemen'=>['THT'],'pengalaman'=>7,'bahasa'=>['ID','AR'],'status'=>'publish','urutan'=>3],
    ];
  @endphp

  <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
      <h3 class="mb-0">Dokter</h3>
      <div class="text-muted">Kelola profil dokter, status, dan urutan tampil.</div>
    </div>
    <div class="d-flex gap-2">
      <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus me-1"></i> Tambah Dokter
      </a>
      <a href="{{ route('admin.schedules.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-calendar-event me-1"></i> Kelola Jadwal
      </a>
    </div>
  </div>

  <div class="card card-soft mb-3">
    <div class="card-body">
      <form class="row g-2">
        <div class="col-md-4"><input type="search" class="form-control" placeholder="Cari nama / spesialis"></div>
        <div class="col-md-3">
          <select class="form-select"><option value="">Semua Status</option><option value="publish">Publish</option><option value="draft">Draft</option></select>
        </div>
        <div class="col-md-3">
          <select class="form-select">
            <option value="">Semua Departemen</option>
            @foreach($departments as $dep)<option>{{ $dep }}</option>@endforeach
          </select>
        </div>
        <div class="col-md-2 text-end"><button class="btn btn-outline-secondary w-100">Filter</button></div>
      </form>
    </div>
  </div>

  <div class="card card-soft">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th style="width:40px;"></th>
              <th>Dokter</th><th>Spesialis</th><th>Departemen</th><th>Pengalaman</th><th>Bahasa</th><th>Status</th><th style="width:150px;">Aksi</th>
            </tr>
          </thead>
          <tbody id="doctorRows">
            @foreach($doctors as $d)
              <tr class="draggable" draggable="true" data-id="{{ $d['id'] }}">
                <td><i class="bi bi-grip-vertical drag-handle"></i></td>
                <td class="fw-semibold">{{ $d['nama'] }} <span class="text-muted">{{ $d['gelar'] }}</span></td>
                <td>{{ $d['spesialis'] }}@if($d['sub'])<div class="text-muted small">{{ $d['sub'] }}</div>@endif</td>
                <td>@foreach($d['departemen'] as $dep)<span class="filter-chip me-1">{{ $dep }}</span>@endforeach</td>
                <td>{{ $d['pengalaman'] }} th</td>
                <td>@foreach($d['bahasa'] as $b)<span class="badge text-bg-light border">{{ $b }}</span>@endforeach</td>
                <td><span class="badge-status {{ $d['status'] }}">{{ strtoupper($d['status']) }}</span></td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <a href="{{ route('admin.doctors.edit', $d['id']) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></a>
                    <button type="button" class="btn btn-outline-secondary btnToggle"><i class="bi bi-power"></i></button>
                    <button type="button" class="btn btn-outline-danger btnDelete"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-between mt-3">
        <div class="text-muted small">Drag & drop baris untuk mengurutkan tampil.</div>
        <button id="saveOrder" class="btn btn-primary">Simpan Urutan</button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  const tbody=document.getElementById('doctorRows'); let dragEl;
  tbody.addEventListener('dragstart',e=>{dragEl=e.target.closest('.draggable');dragEl.classList.add('dragging');});
  tbody.addEventListener('dragend',()=>dragEl?.classList.remove('dragging'));
  tbody.addEventListener('dragover',e=>{
    e.preventDefault();
    const after=[...tbody.querySelectorAll('.draggable:not(.dragging)')]
      .find(r=>e.clientY<=r.getBoundingClientRect().top+r.offsetHeight/2);
    if(after==null) tbody.appendChild(dragEl); else tbody.insertBefore(dragEl,after);
  });
  document.getElementById('saveOrder').addEventListener('click',()=>{
    const order=[...tbody.querySelectorAll('.draggable')].map((tr,i)=>({id:tr.dataset.id,order:i+1}));
    console.log('ORDER BARU:',order); alert('Urutan disimpan (dummy).');
  });
  document.querySelectorAll('.btnToggle').forEach(btn=>{
    btn.addEventListener('click',()=>{
      const badge=btn.closest('tr').querySelector('.badge-status');
      if(badge.classList.contains('publish')){badge.classList.remove('publish');badge.classList.add('draft');badge.textContent='DRAFT';}
      else{badge.classList.add('publish');badge.classList.remove('draft');badge.textContent='PUBLISH';}
    });
  });
  document.querySelectorAll('.btnDelete').forEach(btn=>{
    btn.addEventListener('click',()=>{ if(confirm('Hapus dokter ini?')) btn.closest('tr').remove(); });
  });
</script>
@endpush
