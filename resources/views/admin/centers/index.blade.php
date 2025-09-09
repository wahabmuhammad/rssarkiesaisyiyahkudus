@extends('components.layouts.admin')
@section('title','Center of Excellence / Layanan')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .drag-handle{cursor:grab;color:#64748b}
  .chip{background:#f1f5f9;border:1px solid #e5e7eb;border-radius:999px;padding:.15rem .45rem;margin-right:.25rem}
  .thumb{width:84px;height:54px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb}
</style>
@endpush

@section('content')
@php
  // ===== DEMO DATA (nanti ganti dari DB) =====
  $centers = $centers ?? [
    ['id'=>1,'name'=>'Diabetes Center','icon'=>'bi-activity','image'=>'https://picsum.photos/seed/db/200/120','desc'=>'Manajemen diabetes terpadu.','doctor_ids'=>[1,3],'departments'=>['Penyakit Dalam'],'cta_text'=>'Buat Janji','cta_link'=>'#','order'=>1],
    ['id'=>2,'name'=>'Kesehatan Ibu & Anak','icon'=>'bi-heart-pulse','image'=>'','desc'=>'Layanan ibu hamil & anak.','doctor_ids'=>[2,4],'departments'=>['Kandungan','Anak'],'cta_text'=>'Pelajari','cta_link'=>'#','order'=>2],
  ];

  $doctors = [
    1=>'dr. A. Setiawan, Sp.PD', 2=>'dr. B. Kartika, Sp.OG',
    3=>'dr. C. Rahman, Sp.THT', 4=>'dr. D. Sari, Sp.A',
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Center of Excellence / Layanan</h3>
    <div class="text-muted">Atur layanan unggulan: ikon/gambar, deskripsi, dokter & poli terkait, CTA, urutan tampil.</div>
  </div>
  <a href="{{ route('admin.centers.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah Layanan
  </a>
</div>

<div class="card card-soft">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th style="width:36px;"></th>
            <th>Layanan</th>
            <th>Ikon/Gambar</th>
            <th>Deskripsi</th>
            <th>Dokter & Poli</th>
            <th>CTA</th>
            <th>Urutan</th>
            <th style="width:120px;">Aksi</th>
          </tr>
        </thead>
        <tbody id="rows">
          @foreach($centers as $c)
            <tr class="draggable" draggable="true" data-id="{{ $c['id'] }}">
              <td><i class="bi bi-grip-vertical drag-handle"></i></td>
              <td class="fw-semibold">{{ $c['name'] }}</td>
              <td>
                @if(!empty($c['image']))
                  <img src="{{ $c['image'] }}" class="thumb" alt="">
                @else
                  <span class="chip"><i class="bi {{ $c['icon'] }}"></i> {{ $c['icon'] }}</span>
                @endif
              </td>
              <td class="text-muted">{{ $c['desc'] }}</td>
              <td class="small">
                <div class="mb-1"><strong>Dokter:</strong>
                  @foreach($c['doctor_ids'] as $id)<span class="chip">{{ $doctors[$id] ?? '—' }}</span>@endforeach
                </div>
                <div><strong>Poli:</strong>
                  @foreach($c['departments'] as $p)<span class="chip">{{ $p }}</span>@endforeach
                </div>
              </td>
              <td><code>{{ $c['cta_text'] }}</code><div class="text-muted small">{{ $c['cta_link'] }}</div></td>
              <td>{{ $c['order'] }}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <a href="{{ route('admin.centers.edit',$c['id']) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></a>
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
  // Drag sort (demo)
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
    console.log('ORDER LAYANAN:', order); alert('Urutan disimpan (demo).');
  };

  // Delete UI
  document.querySelectorAll('.btnDel').forEach(b=>b.onclick=()=>{ if(confirm('Hapus layanan ini?')) b.closest('tr').remove(); });
</script>
@endpush
