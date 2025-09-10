@extends('components.layouts.admin')
@section('title','Mitra Asuransi')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .drag-handle{cursor:grab;color:#64748b}
  .logo{width:90px;height:56px;object-fit:contain;border:1px solid #e5e7eb;border-radius:8px;background:#fff}
  .chip{background:#f1f5f9;border:1px solid #e5e7eb;border-radius:999px;padding:.2rem .55rem}
  .badge-st{border-radius:999px;padding:.25rem .55rem;font-weight:600}
  .aktif{background:#E7F8EE;color:#18824A}.nonaktif{background:#FFE8E8;color:#B42318}
</style>
@endpush

@section('content')
@php
  // DEMO DATA
  $insurers = $insurers ?? [
    ['id'=>1,'name'=>'BPJS Kesehatan','group'=>'BPJS','logo'=>'https://picsum.photos/seed/bpjs/200/120','url'=>'https://www.bpjs-kesehatan.go.id','contact'=>'1500400','status'=>'aktif','order'=>1],
    ['id'=>2,'name'=>'ABC Insurance','group'=>'Swasta','logo'=>'','url'=>'https://abc.co.id','contact'=>'021-123456','status'=>'nonaktif','order'=>2],
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Mitra Asuransi</h3>
    <div class="text-muted">Kelola logo, URL, kontak, status, urutan, dan grup (BPJS/Swasta).</div>
  </div>
  <a href="{{ route('admin.insurers.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah Mitra
  </a>
</div>

<div class="card card-soft">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th style="width:36px;"></th>
            <th>Nama</th>
            <th>Grup</th>
            <th>Logo</th>
            <th>URL</th>
            <th>Kontak</th>
            <th>Urutan</th>
            <th>Status</th>
            <th style="width:120px;">Aksi</th>
          </tr>
        </thead>
        <tbody id="rows">
          @foreach($insurers as $x)
          <tr class="draggable" draggable="true" data-id="{{ $x['id'] }}">
            <td><i class="bi bi-grip-vertical drag-handle"></i></td>
            <td class="fw-semibold">{{ $x['name'] }}</td>
            <td><span class="chip">{{ $x['group'] }}</span></td>
            <td>@if($x['logo']) <img src="{{ $x['logo'] }}" class="logo"> @endif</td>
            <td class="small"><a href="{{ $x['url'] }}" target="_blank">{{ $x['url'] }}</a></td>
            <td class="small">{{ $x['contact'] ?: '-' }}</td>
            <td>{{ $x['order'] }}</td>
            <td><span class="badge-st {{ $x['status'] }}">{{ strtoupper($x['status']) }}</span></td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="{{ route('admin.insurers.edit',$x['id']) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></a>
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
  // drag sort (demo)
  const tb=document.getElementById('rows'); let dragEl;
  tb.addEventListener('dragstart',e=>{dragEl=e.target.closest('.draggable');dragEl.classList.add('opacity-50');});
  tb.addEventListener('dragend',()=>dragEl?.classList.remove('opacity-50'));
  tb.addEventListener('dragover',e=>{
    e.preventDefault();
    const after=[...tb.querySelectorAll('.draggable:not(.opacity-50)')]
      .find(r=>e.clientY<=r.getBoundingClientRect().top+r.offsetHeight/2);
    if(!after) tb.appendChild(dragEl); else tb.insertBefore(dragEl,after);
  });
  document.getElementById('saveOrder').onclick=()=>{
    const order=[...tb.querySelectorAll('.draggable')].map((tr,i)=>({id:tr.dataset.id,order:i+1}));
    console.log('ORDER INSURERS:', order); alert('Urutan disimpan (demo).');
  };

  // toggle & delete (UI demo)
  document.querySelectorAll('.btnToggle').forEach(b=>{
    b.onclick=()=>{
      const badge=b.closest('tr').querySelector('.badge-st');
      if(badge.classList.contains('aktif')){badge.classList.replace('aktif','nonaktif');badge.textContent='NONAKTIF';}
      else{badge.classList.replace('nonaktif','aktif');badge.textContent='AKTIF';}
    };
  });
  document.querySelectorAll('.btnDel').forEach(b=>b.onclick=()=>{ if(confirm('Hapus mitra ini?')) b.closest('tr').remove(); });
</script>
@endpush
