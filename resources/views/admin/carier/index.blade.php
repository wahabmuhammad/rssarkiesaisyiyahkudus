@extends('components.layouts.admin')
@section('title','Carier (Lowongan Kerja)')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .drag-handle{cursor:grab;color:#64748b}
  .badge-st{border-radius:999px;padding:.25rem .55rem;font-weight:600}
  .st-draft{background:#FFF4E5;color:#B54708}
  .st-publish{background:#E7F8EE;color:#18824A}
  .st-closed{background:#FFE8E8;color:#B42318}
  .chip{background:#f1f5f9;border:1px solid #e5e7eb;border-radius:999px;padding:.2rem .55rem}
  /* biar teks deskripsi/persyaratan tidak kepanjangan */
  .clamp-3{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
</style>
@endpush

@section('content')
@php
  // DEMO DATA (nanti tinggal ganti dari DB)
  $jobs = $jobs ?? [
    [
      'id'=>1,'title'=>'Dokter Umum','dept'=>'Medical',
      'desc_html'=>'Memberikan pelayanan medis dasar, pemeriksaan fisik, diagnosis awal, serta edukasi kesehatan kepada pasien…',
      'req_html'=>'Profesi Dokter, STR aktif, sertifikat ACLS/ATLS menjadi nilai tambah, komunikasi baik…',
      'deadline'=>now()->addDays(7)->format('Y-m-d'),'status'=>'publish','order'=>1
    ],
    [
      'id'=>2,'title'=>'Perawat ICU','dept'=>'Keperawatan',
      'desc_html'=>'Melaksanakan asuhan keperawatan intensif, monitoring tanda vital, kolaborasi dengan DPJP, pendampingan keluarga pasien…',
      'req_html'=>'D3/S1 Keperawatan + Ners, STR aktif, pengalaman ICU diutamakan, bersedia kerja shift…',
      'deadline'=>now()->addDays(14)->format('Y-m-d'),'status'=>'draft','order'=>2
    ],
    [
      'id'=>3,'title'=>'Admin Front Office','dept'=>'Operasional',
      'desc_html'=>'Melayani pendaftaran pasien, input data, mengarahkan ke poli terkait, menangani informasi & keluhan awal…',
      'req_html'=>'Minimal D3 semua jurusan, service minded, mampu mengoperasikan komputer, komunikatif…',
      'deadline'=>now()->subDays(2)->format('Y-m-d'),'status'=>'closed','order'=>3
    ],
  ];
  $types = ['Full-time','Part-time','Kontrak','Magang']; // masih dipakai di filter demo
  $depts = ['Medical','Keperawatan','Farmasi','Laboratorium','Operasional','IT','Keuangan'];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Carier (Lowongan Kerja)</h3>
    <div class="text-muted">Kelola daftar lowongan: departemen, deskripsi, persyaratan, deadline, status, urutan.</div>
  </div>
  <a href="{{ route('admin.carier.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah Lowongan
  </a>
</div>

<div class="card card-soft mb-3">
  <div class="card-body">
    <form class="row g-2">
      <div class="col-md-4">
        <input type="search" class="form-control" placeholder="Cari posisi/departemen/kata kunci…">
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option value="">Semua Departemen</option>
          @foreach($depts as $d) <option>{{ $d }}</option> @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option value="">Semua Tipe (demo)</option>
          @foreach($types as $t) <option>{{ $t }}</option> @endforeach
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
            <th>Posisi</th>
            <th>Departemen</th>
            <th>Deskripsi</th>     {{-- was: Lokasi --}}
            <th>Persyaratan</th>   {{-- was: Tipe --}}
            <th>Deadline</th>
            <th>Urutan</th>
            <th>Status</th>
            <th style="width:120px;">Aksi</th>
          </tr>
        </thead>
        <tbody id="rows">
          @foreach($jobs as $j)
          <tr class="draggable" draggable="true" data-id="{{ $j['id'] }}">
            <td><i class="bi bi-grip-vertical drag-handle"></i></td>
            <td class="fw-semibold">{{ $j['title'] }}</td>
            <td><span class="chip">{{ $j['dept'] }}</span></td>

            {{-- kolom baru: DESKRIPSI + PERSYARATAN (ringkas, tanpa tag HTML) --}}
            <td class="small text-secondary">
              <div class="clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($j['desc_html'] ?? ''), 140) }}</div>
            </td>
            <td class="small text-secondary">
              <div class="clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($j['req_html'] ?? ''), 140) }}</div>
            </td>

            <td class="small">{{ \Carbon\Carbon::parse($j['deadline'])->format('d M Y') }}</td>
            <td>{{ $j['order'] }}</td>
            <td>
              @php $st = $j['status']; @endphp
              <span class="badge-st st-{{ $st }}">{{ strtoupper($st) }}</span>
            </td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="{{ route('admin.carier.edit',$j['id']) }}" class="btn btn-outline-primary"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-outline-secondary btnStatus"><i class="bi bi-power"></i></button>
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
  // drag-sort (demo)
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
    console.log('ORDER CARIER:', order); alert('Urutan disimpan (demo).');
  };

  // toggle status (draft→publish→closed→draft)
  const nextSt = s => (s==='draft'?'publish':(s==='publish'?'closed':'draft'));
  document.querySelectorAll('.btnStatus').forEach(btn=>{
    btn.onclick=()=>{
      const badge=btn.closest('tr').querySelector('.badge-st');
      const cur=badge.className.match(/st-(draft|publish|closed)/)?.[1]||'draft';
      const nx=nextSt(cur);
      badge.classList.remove('st-draft','st-publish','st-closed');
      badge.classList.add('st-'+nx); badge.textContent = nx.toUpperCase();
    };
  });

  // delete UI
  document.querySelectorAll('.btnDel').forEach(b=>b.onclick=()=>{ if(confirm('Hapus lowongan ini?')) b.closest('tr').remove(); });
</script>
@endpush
