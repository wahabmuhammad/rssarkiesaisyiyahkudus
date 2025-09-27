@extends('components.layouts.admin')
@section('title','Hero/Banner & Popup Dokter')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}

  /* ===== Tampilan KARTU (desktop) ===== */
  .slide-card{
    border:1px solid #e5e7eb;border-radius:16px;padding:12px;background:#fff;
    width:100%;display:flex;gap:.75rem;align-items:flex-start;
  }
  .slide-thumb{width:220px;height:110px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb}
  .slide-card>.flex-grow-1{min-width:0}
  .slide-card>.btn-group{margin-left:auto;flex-shrink:0}

  .drag-handle{cursor:grab;color:#64748b}
  .badge-status{border-radius:999px;padding:.25rem .55rem;font-weight:600}
  .status-publish{background:#E7F8EE;color:#18824A}
  .status-draft{background:#FFF4E5;color:#B54708}
  .chip{background:#f1f5f9;border:1px solid #e5e7eb;border-radius:999px;padding:.2rem .5rem;margin-right:.25rem}

  /* ===== Tampilan TABEL (mobile) ===== */
  .slides-table-mobile{min-width:820px;}      /* memicu scroll horizontal */
  .slides-table-mobile th,.slides-table-mobile td{vertical-align:middle}
  .thumb-sm{width:120px;height:72px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb}

  /* Unblank safeguard untuk halaman ini */
  .navbar.topbar::before{content:none!important;display:none!important;}
  .navbar.topbar{background:var(--bg)!important;isolation:isolate;}
  main,.content{position:relative;z-index:1;}
</style>
@endpush

@section('content')
@php
  $slides = $slides ?? [
    ['id'=>1,'title'=>'Layanan Telemed','desc'=>'Konsultasi dokter dari rumah','cta_text'=>'Mulai Konsultasi','cta_link'=>'#','order'=>1,'status'=>'publish','start_at'=>now()->subDays(3)->format('Y-m-d'),'end_at'=>now()->addDays(30)->format('Y-m-d'),'image'=>'https://picsum.photos/seed/tele/800/360'],
    ['id'=>2,'title'=>'Promo MCU Sep','desc'=>'Diskon s.d. 20%','cta_text'=>'Daftar','cta_link'=>'#','order'=>2,'status'=>'draft','start_at'=>now()->format('Y-m-d'),'end_at'=>now()->addDays(20)->format('Y-m-d'),'image'=>'https://picsum.photos/seed/mcu/800/360'],
  ];
  $departments = ['Penyakit Dalam','Kandungan','THT','Anak','Bedah'];
  $popup = $popup ?? ['enabled'=>true,'button'=>'Buat Janji Dengan Dokter','mode'=>'doctors','ids'=>[1,3]];
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
  {{-- KIRI --}}
  <div class="col-12 col-xl-8">
    <div class="card card-soft">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h5 class="mb-0">Slides Hero</h5>
          <button id="saveOrder" class="btn btn-sm btn-primary">Simpan Urutan</button>
        </div>

        {{-- Desktop: kartu vertikal --}}
        <div class="d-none d-sm-block">
          <div id="slidesWrapCards" class="vstack gap-3">
            @foreach($slides as $s)
              <div class="slide-card draggable" data-id="{{ $s['id'] }}">
                <img src="{{ $s['image'] }}" class="slide-thumb" alt="">
                <div class="flex-grow-1">
                  <div class="d-flex align-items-center gap-2 flex-wrap">
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
                  <button class="btn btn-outline-secondary btnToggle" type="button"><i class="bi bi-power"></i></button>
                  <button class="btn btn-outline-danger btnDelete" type="button"><i class="bi bi-trash"></i></button>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Mobile: tabel bisa geser ke kanan --}}
        <div class="d-block d-sm-none">
          <div class="table-responsive">
            <table class="table align-middle slides-table-mobile">
              <thead>
                <tr>
                  <th style="width:32px;"></th>
                  <th>Slide</th>
                  <th>Judul & Status</th>
                  <th>Periode</th>
                  <th>Deskripsi</th>
                  <th>CTA</th>
                  <th>Urutan</th>
                  <th style="width:110px;">Aksi</th>
                </tr>
              </thead>
              <tbody id="rowsMobile">
                @foreach($slides as $s)
                  <tr class="row-mobile" data-id="{{ $s['id'] }}">
                    <td><i class="bi bi-grip-vertical text-muted"></i></td>
                    <td><img src="{{ $s['image'] }}" class="thumb-sm" alt=""></td>
                    <td>
                      <div class="fw-semibold">{{ $s['title'] }}</div>
                      <span class="badge-status status-{{ $s['status'] }}">{{ strtoupper($s['status']) }}</span>
                    </td>
                    <td class="small">{{ $s['start_at'] }} <span class="text-muted">–</span> {{ $s['end_at'] }}</td>
                    <td class="text-muted small">{{ $s['desc'] }}</td>
                    <td><code>{{ $s['cta_text'] }}</code><div class="text-muted small">{{ $s['cta_link'] }}</div></td>
                    <td>{{ $s['order'] }}</td>
                    <td>
                      <div class="btn-group btn-group-sm">
                        <a class="btn btn-outline-primary" href="{{ route('admin.hero.edit',$s['id']) }}"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-outline-secondary btnToggle" type="button"><i class="bi bi-power"></i></button>
                        <button class="btn btn-outline-danger btnDelete" type="button"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  {{-- KANAN --}}
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

          <div id="popDoctors" class="{{ $popup['mode']==='doctors' ? '' : 'd-none' }}">
            <select multiple size="6" id="popDoctorIds" class="form-select">
              @for($i=1;$i<=4;$i++)
                <option value="{{ $i }}" @selected(in_array($i,$popup['ids']))>dr. #{{ $i }}</option>
              @endfor
            </select>
            <div class="form-text">Pilih beberapa dokter untuk ditampilkan.</div>
          </div>

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
  const wrapCards  = document.getElementById('slidesWrapCards');   // desktop
  const rowsMobile = document.getElementById('rowsMobile');        // mobile
  const saveBtn    = document.getElementById('saveOrder');
  const isTouch = ('ontouchstart' in window) || navigator.maxTouchPoints > 0 || window.matchMedia('(pointer:coarse)').matches;

  /* ===== Drag sort: desktop (kartu) saja ===== */
  if (!isTouch && wrapCards){
    let dragging;
    wrapCards.querySelectorAll('.draggable').forEach(el => el.setAttribute('draggable','true'));
    wrapCards.addEventListener('dragstart', e => {
      const el=e.target.closest('.draggable'); if(!el) return;
      dragging=el; el.classList.add('opacity-50');
    });
    wrapCards.addEventListener('dragend', ()=>{ dragging?.classList.remove('opacity-50'); dragging=null; });
    wrapCards.addEventListener('dragover', e=>{
      e.preventDefault();
      const items=[...wrapCards.querySelectorAll('.draggable:not(.opacity-50)')];
      const after=items.find(it=>e.clientY<=it.getBoundingClientRect().top+it.offsetHeight/2);
      if(after==null) wrapCards.appendChild(dragging); else wrapCards.insertBefore(dragging,after);
    });
  }

  /* ===== Helper sync status & delete antara dua tampilan ===== */
  function findPair(id){
    return {
      card: document.querySelector('.slide-card[data-id="'+id+'"]'),
      row : document.querySelector('tr[data-id="'+id+'"]')
    };
  }
  function setStatus(id, status){
    const {card,row}=findPair(id);
    [card,row].forEach(el=>{
      if(!el) return;
      const b=el.querySelector('.badge-status'); if(!b) return;
      b.classList.toggle('status-publish', status==='publish');
      b.classList.toggle('status-draft',   status==='draft');
      b.textContent = status.toUpperCase();
    });
  }
  function removeBoth(id){
    const {card,row}=findPair(id);
    card?.remove(); row?.remove();
  }

  /* ===== Bind Toggle/Delete (kedua tampilan) ===== */
  document.addEventListener('click', (e)=>{
    const toggle = e.target.closest('.btnToggle');
    const del    = e.target.closest('.btnDelete');
    if (toggle){
      const host = toggle.closest('.slide-card, tr');
      const id   = host?.dataset.id;
      const badge= host.querySelector('.badge-status');
      const now  = badge.classList.contains('status-publish') ? 'publish' : 'draft';
      const next = now==='publish' ? 'draft' : 'publish';
      setStatus(id, next);
    }
    if (del){
      const host = del.closest('.slide-card, tr');
      const id   = host?.dataset.id;
      if (confirm('Hapus slide ini?')) removeBoth(id);
    }
  });

  /* ===== Simpan urutan (ambil dari tampilan yang aktif) ===== */
  saveBtn?.addEventListener('click', ()=>{
    let orderEls = [];
    if (window.getComputedStyle(document.querySelector('.d-none.d-sm-block')||{}).display !== 'none') {
      // desktop: kartu
      orderEls = [...document.querySelectorAll('#slidesWrapCards .draggable')];
    } else {
      // mobile: tabel (tidak drag, pakai urutan tampil)
      orderEls = [...document.querySelectorAll('#rowsMobile tr[data-id]')];
    }
    const order = orderEls.map((el,i)=>({id:el.dataset.id,order:i+1}));
    console.log('ORDER SLIDES:', order);
    alert('Urutan disimpan (demo).');
  });

  /* ==== Popup settings (UI demo) ==== */
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
  window.savePopup = savePopup;
</script>
@endpush
