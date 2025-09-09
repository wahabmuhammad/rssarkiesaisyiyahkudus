@extends('components.layouts.admin')
@section('title','Hero/Banner & Popup Dokter')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .slide-card{border:1px solid #e5e7eb;border-radius:16px;padding:12px;background:#fff}
  .slide-thumb{width:220px;height:110px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb}
  .drag-handle{cursor:grab;color:#64748b}
  .badge-status{border-radius:999px;padding:.25rem .55rem;font-weight:600}
  .status-publish{background:#E7F8EE;color:#18824A}
  .status-draft{background:#FFF4E5;color:#B54708}
  .chip{background:#f1f5f9;border:1px solid #e5e7eb;border-radius:999px;padding:.2rem .5rem;margin-right:.25rem}
</style>
@endpush

@section('content')
@php
  // ===== Demo data (ganti dari DB nanti) =====
  $slides = $slides ?? [
    ['id'=>1,'title'=>'Layanan Telemed','desc'=>'Konsultasi dokter dari rumah','cta_text'=>'Mulai Konsultasi','cta_link'=>'#','order'=>1,'status'=>'publish','start_at'=>now()->subDays(3)->format('Y-m-d'),'end_at'=>now()->addDays(30)->format('Y-m-d'),'image'=>'https://picsum.photos/seed/tele/800/360'],
    ['id'=>2,'title'=>'Promo MCU Sep','desc'=>'Diskon s.d. 20%','cta_text'=>'Daftar','cta_link'=>'#','order'=>2,'status'=>'draft','start_at'=>now()->format('Y-m-d'),'end_at'=>now()->addDays(20)->format('Y-m-d'),'image'=>'https://picsum.photos/seed/mcu/800/360'],
  ];
  $doctors = [
    ['id'=>1,'name'=>'dr. A. Setiawan, Sp.PD'], ['id'=>2,'name'=>'dr. B. Kartika, Sp.OG'],
    ['id'=>3,'name'=>'dr. C. Rahman, Sp.THT'], ['id'=>4,'name'=>'dr. D. Sari, Sp.A'],
  ];
  $departments = ['Penyakit Dalam','Kandungan','THT','Anak','Bedah'];
  // ===== Pengaturan popup (dummy) =====
  $popup = $popup ?? ['enabled'=>true, 'button'=>'Buat Janji Dengan Dokter',
                      'mode'=>'doctors', // doctors|departments
                      'ids'=>[1,3]];     // id dokter atau indeks departemen
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Hero/Banner & Popup Dokter</h3>
    <div class="text-muted">Kelola slide hero & konfigurasi popup dokter pada beranda.</div>
  </div>
  <a href="{{ route('admin.hero.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah Slide
  </a>
</div>

<div class="row g-3">
  {{-- Kiri: daftar slide --}}
  <div class="col-12 col-xl-8">
    <div class="card card-soft">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="mb-0">Slides Hero</h5>
          <button id="saveOrder" class="btn btn-sm btn-primary">Simpan Urutan</button>
        </div>

        <div id="slidesWrap" class="vstack gap-3">
          @foreach($slides as $s)
            <div class="slide-card d-flex align-items-start gap-3 draggable" draggable="true" data-id="{{ $s['id'] }}">
              <img src="{{ $s['image'] }}" class="slide-thumb" alt="">
              <div class="flex-grow-1">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-grip-vertical drag-handle"></i>
                  <div class="fw-semibold">{{ $s['title'] }}</div>
                  <span class="badge-status status-{{ $s['status'] }}">{{ strtoupper($s['status']) }}</span>
                  <span class="chip">Urutan: {{ $s['order'] }}</span>
                  <span class="chip">Periode: {{ $s['start_at'] }} – {{ $s['end_at'] }}</span>
                </div>
                <div class="text-muted small mt-1">{{ $s['desc'] }}</div>
                <div class="small mt-1">CTA: <code>{{ $s['cta_text'] }}</code> → <span class="text-muted">{{ $s['cta_link'] }}</span></div>
              </div>
              <div class="btn-group btn-group-sm">
                <a class="btn btn-outline-primary" href="{{ route('admin.hero.edit',$s['id']) }}"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-outline-secondary btnToggle"><i class="bi bi-power"></i></button>
                <button class="btn btn-outline-danger btnDelete"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>

  {{-- Kanan: pengaturan popup dokter --}}
  <div class="col-12 col-xl-4">
    <form class="card card-soft" onsubmit="return savePopup()">
      <div class="card-body">
        <h5 class="mb-2">Popup Dokter (di Hero)</h5>
        <div class="form-check form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="popEnabled" {{ $popup['enabled']?'checked':'' }}>
          <label class="form-check-label" for="popEnabled">Aktifkan Popup</label>
        </div>

        <div class="mb-3">
          <label class="form-label">Teks Tombol</label>
          <input id="popButton" class="form-control" value="{{ $popup['button'] }}" placeholder="mis. Buat Janji Dengan Dokter">
        </div>

        <div class="mb-2">
          <label class="form-label">Isi Popup</label>
          <div class="d-flex gap-3 mb-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="popMode" id="modeDoctors" value="doctors" {{ $popup['mode']==='doctors'?'checked':'' }}>
              <label class="form-check-label" for="modeDoctors">Daftar Dokter</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="popMode" id="modeDeps" value="departments" {{ $popup['mode']==='departments'?'checked':'' }}>
              <label class="form-check-label" for="modeDeps">Shortcut Poli</label>
            </div>
          </div>

          {{-- Doctors --}}
          <div id="popDoctors" class="{{ $popup['mode']==='doctors' ? '' : 'd-none' }}">
            <select multiple size="6" id="popDoctorIds" class="form-select">
              @foreach($doctors as $d)
                <option value="{{ $d['id'] }}" @selected(in_array($d['id'],$popup['ids']))>{{ $d['name'] }}</option>
              @endforeach
            </select>
            <div class="form-text">Pilih beberapa dokter untuk ditampilkan.</div>
          </div>

          {{-- Departments --}}
          <div id="popDeps" class="{{ $popup['mode']==='departments' ? '' : 'd-none' }}">
            <select multiple size="6" id="popDepIdx" class="form-select">
              @foreach($departments as $i=>$dep)
                <option value="{{ $i }}" @selected(in_array($i,$popup['ids']))>{{ $dep }}</option>
              @endforeach
            </select>
            <div class="form-text">Pilih beberapa poli sebagai shortcut.</div>
          </div>
        </div>

        <div class="d-flex justify-content-end">
          <button class="btn btn-primary">Simpan Pengaturan</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
<script>
  // ==== Drag & drop urutan slide (front-end demo)
  const wrap = document.getElementById('slidesWrap'); let dragging;
  wrap.addEventListener('dragstart',e=>{ dragging = e.target.closest('.draggable'); dragging.classList.add('opacity-50'); });
  wrap.addEventListener('dragend',()=>{ dragging?.classList.remove('opacity-50'); dragging=null; });
  wrap.addEventListener('dragover',e=>{
    e.preventDefault();
    const items=[...wrap.querySelectorAll('.draggable:not(.opacity-50)')];
    const after=items.find(it=>e.clientY<=it.getBoundingClientRect().top+it.offsetHeight/2);
    if(after==null) wrap.appendChild(dragging); else wrap.insertBefore(dragging,after);
  });
  document.getElementById('saveOrder').onclick = ()=>{
    const order=[...wrap.querySelectorAll('.draggable')].map((el,i)=>({id:el.dataset.id,order:i+1}));
    console.log('ORDER SLIDES:', order);
    alert('Urutan disimpan (demo).');
  };

  // Toggle status + delete (UI)
  document.querySelectorAll('.btnToggle').forEach(btn=>{
    btn.addEventListener('click',()=>{
      const badge = btn.closest('.slide-card').querySelector('.badge-status');
      if(badge.classList.contains('status-publish')){ badge.classList.replace('status-publish','status-draft'); badge.textContent='DRAFT'; }
      else{ badge.classList.replace('status-draft','status-publish'); badge.textContent='PUBLISH'; }
    });
  });
  document.querySelectorAll('.btnDelete').forEach(btn=>{
    btn.addEventListener('click',()=>{ if(confirm('Hapus slide ini?')) btn.closest('.slide-card').remove(); });
  });

  // ==== Popup settings (UI demo)
  function syncPopup(){
    const doctors = document.getElementById('popDoctors');
    const deps = document.getElementById('popDeps');
    const mode = document.querySelector('input[name="popMode"]:checked').value;
    doctors.classList.toggle('d-none', mode!=='doctors');
    deps.classList.toggle('d-none', mode!=='departments');
  }
  document.getElementById('modeDoctors').onchange = syncPopup;
  document.getElementById('modeDeps').onchange = syncPopup;
  function savePopup(){
    const enabled = document.getElementById('popEnabled').checked;
    const button  = document.getElementById('popButton').value.trim();
    const mode    = document.querySelector('input[name="popMode"]:checked').value;
    const ids     = [...document.querySelectorAll((mode==='doctors'?'#popDoctorIds':'#popDepIdx')+' option:checked')].map(o=>o.value);
    console.log('POPUP SAVE:', {enabled,button,mode,ids});
    alert('Pengaturan popup disimpan (demo).');
    return false; // jangan submit
  }
</script>
@endpush
