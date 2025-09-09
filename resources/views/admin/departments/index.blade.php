@extends('components.layouts.admin')
@section('title','Departemen / Poli')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .badge-status{border-radius:999px;padding:.35rem .6rem;font-weight:600;}
  .badge-status.publish{background:#E7F8EE;color:#18824a;}
  .badge-status.draft{background:#FFE8E8;color:#b42318;}
  .drag-handle{cursor:grab;color:#64748b;}
  .draggable.dragging{opacity:.6;}
  .filter-chip{background:#fff;border:1px solid #e5e7eb;border-radius:999px;padding:.35rem .6rem;}
</style>
@endpush

@section('content')
@php
  // demo data — nanti diganti dari controller
  $departments = $departments ?? [
    ['id'=>1,'nama'=>'Poli Anak','ikon'=>'bi-emoji-smile','deskripsi'=>'Layanan kesehatan anak.','gedung'=>'Gedung B','lantai'=>'Lantai 1','urutan'=>1,'status'=>'publish'],
    ['id'=>2,'nama'=>'Poli Penyakit Dalam','ikon'=>'bi-heart-pulse','deskripsi'=>'Penyakit dalam komprehensif.','gedung'=>'Gedung A','lantai'=>'Lantai 2','urutan'=>2,'status'=>'publish'],
    ['id'=>3,'nama'=>'Poli THT','ikon'=>'bi-ear','deskripsi'=>'Telinga, Hidung, Tenggorokan.','gedung'=>'Gedung C','lantai'=>'Lantai 3','urutan'=>3,'status'=>'draft'],
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Departemen / Poli</h3>
    <div class="text-muted">Kelola poli: nama, ikon, lokasi, urutan & status.</div>
  </div>
  <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah Poli
  </a>
</div>

<div class="card card-soft mb-3">
  <div class="card-body">
    <form class="row g-2">
      <div class="col-md-6"><input type="search" class="form-control" placeholder="Cari nama poli / lokasi"></div>
      <div class="col-md-3">
        <select class="form-select">
          <option value="">Semua Status</option>
          <option value="publish">Publish</option>
          <option value="draft">Draft</option>
        </select>
      </div>
      <div class="col-md-3 text-end">
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
            <th style="width:40px;"></th>
            <th>Poli</th>
            <th>Ikon</th>
            <th>Deskripsi</th>
            <th>Lokasi</th>
            <th>Urutan</th>
            <th>Status</th>
            <th style="width:150px;">Aksi</th>
          </tr>
        </thead>
        <tbody id="deptRows">
          @foreach($departments as $p)
            <tr class="draggable" draggable="true" data-id="{{ $p['id'] }}">
              <td><i class="bi bi-grip-vertical drag-handle"></i></td>
              <td class="fw-semibold">{{ $p['nama'] }}</td>
              <td><i class="bi {{ $p['ikon'] }} me-1"></i><code class="small">{{ $p['ikon'] }}</code></td>
              <td class="text-muted">{{ $p['deskripsi'] }}</td>
              <td><span class="filter-chip me-1">{{ $p['gedung'] }}</span><span class="filter-chip">{{ $p['lantai'] }}</span></td>
              <td>{{ $p['urutan'] }}</td>
              <td><span class="badge-status {{ $p['status'] }}">{{ strtoupper($p['status']) }}</span></td>
              <td>
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('admin.departments.edit', $p['id']) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></a>
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
  const tbody=document.getElementById('deptRows'); let dragEl;
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
    console.log('ORDER POLI:',order); alert('Urutan disimpan (dummy).');
  });
  document.querySelectorAll('.btnToggle').forEach(btn=>{
    btn.addEventListener('click',()=>{
      const badge=btn.closest('tr').querySelector('.badge-status');
      if(badge.classList.contains('publish')){badge.classList.remove('publish');badge.classList.add('draft');badge.textContent='DRAFT';}
      else{badge.classList.add('publish');badge.classList.remove('draft');badge.textContent='PUBLISH';}
    });
  });
  document.querySelectorAll('.btnDelete').forEach(btn=>{
    btn.addEventListener('click',()=>{ if(confirm('Hapus poli ini?')) btn.closest('tr').remove(); });
  });
</script>
@endpush
