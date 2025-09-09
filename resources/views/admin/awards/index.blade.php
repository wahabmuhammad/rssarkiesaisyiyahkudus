@extends('components.layouts.admin')
@section('title','Penghargaan & Akreditasi')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .badge-status{border-radius:999px;padding:.25rem .55rem;font-weight:600}
  .status-publish{background:#E7F8EE;color:#18824a}
  .status-draft{background:#FFF4E5;color:#B54708}
  .drag-handle{cursor:grab;color:#64748b}
  .logo{width:90px;height:56px;object-fit:contain;border-radius:8px;border:1px solid #e5e7eb;background:#fff}
</style>
@endpush

@section('content')
@php
  // ===== DEMO DATA (ganti dari DB nanti) =====
  $awards = $awards ?? [
    ['id'=>1,'name'=>'Akreditasi Paripurna KARS','year'=>2024,'org'=>'KARS','logo'=>'https://picsum.photos/seed/kars/160/100','cert'=>'https://example.com/kars.pdf','order'=>1,'status'=>'publish'],
    ['id'=>2,'name'=>'Penghargaan Pelayanan Prima','year'=>2023,'org'=>'Kemenkes','logo'=>'https://picsum.photos/seed/menkes/160/100','cert'=>'','order'=>2,'status'=>'draft'],
  ];
  $years = collect(range(now()->year, now()->year-10));
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Penghargaan & Akreditasi</h3>
    <div class="text-muted">Kelola daftar penghargaan/akreditasi: logo, sertifikat (PDF), urutan & status.</div>
  </div>
  <a href="{{ route('admin.awards.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah Penghargaan
  </a>
</div>

<div class="card card-soft mb-3">
  <div class="card-body">
    <form class="row g-2">
      <div class="col-md-5">
        <input type="search" class="form-control" placeholder="Cari nama/penyelenggara…">
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option value="">Semua Tahun</option>
          @foreach($years as $y) <option>{{ $y }}</option> @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <select class="form-select">
          <option value="">Semua Status</option>
          <option value="publish">Publish</option>
          <option value="draft">Draft</option>
        </select>
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
            <th style="width:36px;"></th>
            <th>Nama Penghargaan</th>
            <th>Tahun</th>
            <th>Penyelenggara</th>
            <th>Logo</th>
            <th>Sertifikat</th>
            <th>Urutan</th>
            <th>Status</th>
            <th style="width:120px;">Aksi</th>
          </tr>
        </thead>
        <tbody id="rows">
          @foreach($awards as $a)
            <tr class="draggable" draggable="true" data-id="{{ $a['id'] }}">
              <td><i class="bi bi-grip-vertical drag-handle"></i></td>
              <td class="fw-semibold">{{ $a['name'] }}</td>
              <td>{{ $a['year'] }}</td>
              <td>{{ $a['org'] }}</td>
              <td>@if($a['logo']) <img src="{{ $a['logo'] }}" class="logo" alt=""> @endif</td>
              <td>
                @if($a['cert'])
                  <a href="{{ $a['cert'] }}" target="_blank" class="small"><i class="bi bi-file-earmark-pdf me-1"></i>Lihat PDF</a>
                @else
                  <span class="text-muted small">-</span>
                @endif
              </td>
              <td>{{ $a['order'] }}</td>
              <td><span class="badge-status status-{{ $a['status'] }}">{{ strtoupper($a['status']) }}</span></td>
              <td>
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('admin.awards.edit',$a['id']) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></a>
                  <button class="btn btn-outline-secondary btnToggle"><i class="bi bi-power"></i></button>
                  <button class="btn btn-outline-danger btnDel"><i class="bi bi-trash"></i></button>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-between mt-2">
      <div class="text-muted small">Drag & drop baris untuk mengurutkan.</div>
      <button id="saveOrder" class="btn btn-primary btn-sm">Simpan Urutan</button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  // Drag-sort (demo)
  const tb=document.getElementById('rows'); let dragEl;
  tb.addEventListener('dragstart',e=>{dragEl=e.target.closest('.draggable'); dragEl.classList.add('opacity-50');});
  tb.addEventListener('dragend',()=>dragEl?.classList.remove('opacity-50'));
  tb.addEventListener('dragover',e=>{
    e.preventDefault();
    const after=[...tb.querySelectorAll('.draggable:not(.opacity-50)')]
      .find(r=>e.clientY<=r.getBoundingClientRect().top+r.offsetHeight/2);
    if(!after) tb.appendChild(dragEl); else tb.insertBefore(dragEl,after);
  });
  document.getElementById('saveOrder').onclick=()=>{
    const order=[...tb.querySelectorAll('.draggable')].map((tr,i)=>({id:tr.dataset.id,order:i+1}));
    console.log('ORDER AWARDS:', order); alert('Urutan disimpan (demo).');
  };

  // Toggle & delete (UI demo)
  document.querySelectorAll('.btnToggle').forEach(b=>{
    b.onclick=()=>{
      const badge=b.closest('tr').querySelector('.badge-status');
      if(badge.classList.contains('status-publish')){badge.classList.replace('status-publish','status-draft');badge.textContent='DRAFT';}
      else{badge.classList.replace('status-draft','status-publish');badge.textContent='PUBLISH';}
    };
  });
  document.querySelectorAll('.btnDel').forEach(b=>b.onclick=()=>{ if(confirm('Hapus item ini?')) b.closest('tr').remove(); });
</script>
@endpush
