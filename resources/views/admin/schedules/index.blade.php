@extends('components.layouts.admin')
@section('title','Jadwal Dokter')

@push('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .toolbar .btn{border-radius:10px}
  .cal-grid{width:100%; border-collapse:separate; border-spacing:0 8px;}
  .cal-grid th{position:sticky; top:0; background:#f8fbff; z-index:1}
  .cal-grid thead th{font-weight:600; color:#334155; padding:.8rem .75rem}
  .cal-grid tbody th{font-weight:600; color:#0f172a; width:220px;}
  .cal-cell{background:#fff;border:1px solid #e5e7eb;border-radius:12px; min-height:80px; padding:.5rem; vertical-align:top;}
  .slot{display:flex; align-items:center; gap:.35rem; padding:.25rem .45rem; border-radius:999px; margin:.25rem 0; font-size:.8rem; border:1px solid #e5e7eb; background:#f8fafc;}
  .slot .dot{width:8px;height:8px;border-radius:999px; display:inline-block}
  .slot.reguler .dot{background:#2563eb}
  .slot.telemed .dot{background:#0ea5e9}
  .slot.operasi .dot{background:#ef4444}
  .slot.libur{background:#fff1f2; border-color:#fecdd3}
  .cell-actions{display:flex; gap:.35rem; justify-content:flex-end}
  .add-btn{border:1px dashed #a9c6ff; background:#fff}
  .add-btn:hover{border-style:solid}
  .badge-status{border-radius:999px; padding:.2rem .5rem}
  .badge-status.aktif{background:#E7F8EE;color:#18824a}
  .badge-status.libur{background:#FFE8E8;color:#b42318}
  .table-list th{font-weight:600}
</style>
@endpush

@section('content')
@php
  // ======= DEMO DATA (ganti dari controller nanti) =======
  $start = now()->startOfWeek(); // Senin
  $days = collect(range(0,6))->map(fn($i)=>[
    'key'=>$i,
    'ymd'=>$start->copy()->addDays($i)->format('Y-m-d'),
    'label'=>$start->copy()->addDays($i)->translatedFormat('D, d M') // Sen, 02 Sep
  ]);

  $doctors = [
    ['id'=>1,'name'=>'dr. A. Setiawan','poli'=>'Penyakit Dalam','color'=>'#2563eb','lokasi'=>'RS Sarkies'],
    ['id'=>2,'name'=>'dr. B. Kartika','poli'=>'Kandungan','color'=>'#0ea5e9','lokasi'=>'RS Sarkies'],
    ['id'=>3,'name'=>'dr. C. Rahman','poli'=>'THT','color'=>'#10b981','lokasi'=>'Klinik Utama'],
  ];

  // contoh slot: id, doctor_id, date(YYYY-mm-dd), start,end, quota, lokasi, type, status, note
  $slots = [
    ['id'=>101,'doctor_id'=>1,'date'=>$days[1]['ymd'],'start'=>'08:00','end'=>'10:30','quota'=>20,'lokasi'=>'RS Sarkies','type'=>'reguler','status'=>'aktif','note'=>''],
    ['id'=>102,'doctor_id'=>1,'date'=>$days[4]['ymd'],'start'=>'13:00','end'=>'15:00','quota'=>15,'lokasi'=>'RS Sarkies','type'=>'telemed','status'=>'aktif','note'=>''],
    ['id'=>103,'doctor_id'=>2,'date'=>$days[2]['ymd'],'start'=>'09:00','end'=>'12:00','quota'=>25,'lokasi'=>'RS Sarkies','type'=>'reguler','status'=>'aktif','note'=>''],
    ['id'=>104,'doctor_id'=>2,'date'=>$days[5]['ymd'],'start'=>'08:00','end'=>'11:00','quota'=>18,'lokasi'=>'RS Sarkies','type'=>'operasi','status'=>'aktif','note'=>'Kamar OK'],
    ['id'=>105,'doctor_id'=>3,'date'=>$days[0]['ymd'],'start'=>'10:00','end'=>'12:00','quota'=>10,'lokasi'=>'Klinik Utama','type'=>'reguler','status'=>'aktif','note'=>''],
    ['id'=>106,'doctor_id'=>3,'date'=>$days[6]['ymd'],'start'=>'00:00','end'=>'23:59','quota'=>0,'lokasi'=>'Klinik Utama','type'=>'reguler','status'=>'libur','note'=>'Libur nasional'],
  ];

  $locations = ['RS Sarkies','Klinik Utama'];
  $types = ['reguler'=>'Reguler','telemed'=>'Telemed','operasi'=>'Operasi'];
@endphp

{{-- Toolbar & Filter --}}
<div class="card card-soft mb-3">
  <div class="card-body">
    <div class="d-flex flex-wrap gap-2 align-items-center toolbar">
      <div class="btn-group">
        <a class="btn btn-outline-primary" id="prevWeek"><i class="bi bi-chevron-left"></i></a>
        <span class="btn btn-light fw-semibold" id="weekLabel">
          {{ $days[0]['label'] }} – {{ $days[6]['label'] }}
        </span>
        <a class="btn btn-outline-primary" id="nextWeek"><i class="bi bi-chevron-right"></i></a>
      </div>

      <div class="vr mx-2"></div>

      <select class="form-select" id="fDoctor" style="max-width:220px">
        <option value="">Semua Dokter</option>
        @foreach($doctors as $d) <option value="{{ $d['id'] }}">{{ $d['name'] }}</option> @endforeach
      </select>
      <select class="form-select" id="fPoli" style="max-width:200px">
        <option value="">Semua Poli</option>
        @foreach(collect($doctors)->pluck('poli')->unique() as $p) <option>{{ $p }}</option> @endforeach
      </select>
      <select class="form-select" id="fLokasi" style="max-width:180px">
        <option value="">Semua Lokasi</option>
        @foreach($locations as $l) <option>{{ $l }}</option> @endforeach
      </select>
      <select class="form-select" id="fType" style="max-width:180px">
        <option value="">Semua Tipe</option>
        @foreach($types as $k=>$v) <option value="{{ $k }}">{{ $v }}</option> @endforeach
      </select>
      <select class="form-select" id="fStatus" style="max-width:160px">
        <option value="">Semua Status</option>
        <option value="aktif">Aktif</option>
        <option value="libur">Libur</option>
      </select>

      <div class="ms-auto d-flex flex-wrap gap-2">
        <div class="btn-group" role="group">
          <button class="btn btn-outline-secondary" id="toggleView" data-mode="calendar"><i class="bi bi-grid-3x3-gap"></i> Kalender</button>
          <button class="btn btn-outline-secondary" id="toggleViewList" data-mode="list"><i class="bi bi-list-ul"></i> List</button>
        </div>
        <button class="btn btn-primary" id="btnAdd"><i class="bi bi-plus-circle me-1"></i> Tambah Slot</button>
        <div class="btn-group">
          <button class="btn btn-outline-primary" id="btnCopy"><i class="bi bi-arrow-right-square me-1"></i> Copy minggu ini → depan</button>
          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#importModal"><i class="bi bi-file-earmark-spreadsheet me-1"></i> Impor CSV</button>
          <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deactivateModal"><i class="bi bi-slash-circle me-1"></i> Mass Deactivate</button>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Kalender Mingguan --}}
<div id="calendarWrap" class="card card-soft mb-3">
  <div class="card-body">
    <div class="table-responsive">
      <table class="cal-grid table">
        <thead>
          <tr>
            <th style="width:220px">Dokter</th>
            @foreach($days as $dy)
              <th>{{ $dy['label'] }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody id="calBody">
          {{-- di-render via JS agar interaktif --}}
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- List View --}}
<div id="listWrap" class="card card-soft d-none">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-list align-middle" id="listTable">
        <thead>
          <tr>
            <th>Dokter</th><th>Tanggal</th><th>Waktu</th><th>Quota</th><th>Lokasi</th><th>Tipe</th><th>Status</th><th>Catatan</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody><!-- render by JS --></tbody>
      </table>
    </div>
  </div>
</div>

{{-- Modal Tambah/Edit Slot --}}
<div class="modal fade" id="slotModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <form class="modal-content" id="slotForm">
      <div class="modal-header">
        <h5 class="modal-title" id="slotTitle">Tambah Slot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="slotId">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Dokter</label>
            <select id="fDoctorSel" class="form-select" required>
              <option value="">Pilih Dokter</option>
              @foreach($doctors as $d) <option value="{{ $d['id'] }}">{{ $d['name'] }} — {{ $d['poli'] }}</option> @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Poli</label>
            <input id="fPoliSel" class="form-control" placeholder="Otomatis dari dokter" readonly>
          </div>

          <div class="col-md-6">
            <label class="form-label">Tanggal</label>
            <input type="date" id="fDate" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Mulai</label>
            <input type="time" id="fStart" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label">Selesai</label>
            <input type="time" id="fEnd" class="form-control" required>
          </div>

          <div class="col-md-3">
            <label class="form-label">Kuota (opsional)</label>
            <input type="number" id="fQuota" class="form-control" min="0" placeholder="cth 20">
          </div>
          <div class="col-md-4">
            <label class="form-label">Lokasi</label>
            <select id="fLoc" class="form-select">
              @foreach($locations as $l) <option>{{ $l }}</option> @endforeach
            </select>
          </div>
          <div class="col-md-5">
            <label class="form-label">Tipe</label>
            <select id="fTypeSel" class="form-select">
              @foreach($types as $k=>$v) <option value="{{ $k }}">{{ $v }}</option> @endforeach
            </select>
          </div>

          <div class="col-12">
            <label class="form-label">Catatan</label>
            <input id="fNote" class="form-control" placeholder="contoh: tutup sementara">
          </div>

          <div class="col-md-4">
            <label class="form-label">Status</label>
            <select id="fStatus" class="form-select">
              <option value="aktif">Aktif</option>
              <option value="libur">Libur</option>
            </select>
          </div>

          <div class="col-12"><hr></div>

          <div class="col-md-4">
            <div class="form-check form-switch mt-2">
              <input class="form-check-input" type="checkbox" id="repeatWeekly">
              <label class="form-check-label" for="repeatWeekly">Ulangi mingguan</label>
            </div>
          </div>
          <div class="col-md-4">
            <label class="form-label">Berlaku Mulai</label>
            <input type="date" id="repeatFrom" class="form-control">
          </div>
          <div class="col-md-4">
            <label class="form-label">Sampai</label>
            <input type="date" id="repeatTo" class="form-control">
          </div>

          <div class="col-12">
            <label class="form-label">Exception/Override (tanggal dipisah koma)</label>
            <input id="exceptions" class="form-control" placeholder="2025-09-10, 2025-09-12 (libur nasional/cuti)">
          </div>

          <div class="col-12">
            <div id="conflictBox" class="alert alert-danger d-none mb-0">
              <strong>Konflik jadwal!</strong> Dokter sudah memiliki slot pada waktu tersebut.
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Batal</button>
        <button class="btn btn-primary" id="btnSaveSlot" type="submit">Simpan</button>
      </div>
    </form>
  </div>
</div>

{{-- Modal Impor CSV --}}
<div class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Impor CSV Jadwal</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="mb-2">Format kolom: <code>doctor_id,date,start,end,quota,location,type,status,note</code></p>
        <div class="mb-2">
          <textarea id="csvText" class="form-control" rows="6" placeholder="Tempel data CSV di sini untuk demo impor..."></textarea>
        </div>
        <div class="text-muted small">*Demo only — data akan diparse & ditambahkan ke minggu aktif.</div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
        <button class="btn btn-primary" id="btnImportCsv">Impor</button>
      </div>
    </div>
  </div>
</div>

{{-- Modal Mass Deactivate --}}
<div class="modal fade" id="deactivateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mass Deactivate (Libur)</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12">
            <label class="form-label">Rentang tanggal</label>
            <div class="d-flex gap-2">
              <input type="date" id="massFrom" class="form-control">
              <input type="date" id="massTo" class="form-control">
            </div>
          </div>
          <div class="col-12">
            <label class="form-label">Filter dokter (opsional)</label>
            <select id="massDoctor" class="form-select">
              <option value="">Semua</option>
              @foreach($doctors as $d) <option value="{{ $d['id'] }}">{{ $d['name'] }}</option> @endforeach
            </select>
          </div>
          <div class="col-12">
            <label class="form-label">Catatan</label>
            <input id="massNote" class="form-control" placeholder="Libur lebaran">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button class="btn btn-danger" id="btnMassDeactivate">Terapkan</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  // ====== Data awal dari PHP
  const DAY_LABELS = @json($days->pluck('label'));
  let weekDates = @json($days->pluck('ymd')); // array 7 tanggal (Sen-Ming)
  const doctors = @json($doctors);
  let slots = @json($slots);

  // ====== Helpers
  const el = (q, s=document)=>s.querySelector(q);
  const els = (q, s=document)=>[...s.querySelectorAll(q)];
  const fmtTime = t => t.slice(0,5);
  function overlaps(s1,e1,s2,e2){ return (s1 < e2 && s2 < e1); } // half-open
  function doctorById(id){ return doctors.find(d=>d.id==id); }
  function dateAdd(d, days){ const dt=new Date(d); dt.setDate(dt.getDate()+days); return dt.toISOString().slice(0,10); }

  // ====== Rendering
  function renderCalendar(){
    const body = el('#calBody'); body.innerHTML='';
    const f = currentFilter();
    doctors.forEach(doc=>{
      if (f.doctor && +f.doctor !== +doc.id) return;
      if (f.poli && f.poli !== doc.poli) return;
      const tr = document.createElement('tr');
      const th = document.createElement('th'); th.textContent = doc.name + ' — ' + doc.poli; tr.appendChild(th);
      weekDates.forEach((d,i)=>{
        const td = document.createElement('td'); td.className='cal-cell';
        // button tambah di pojok
        const plus = document.createElement('button');
        plus.className='btn btn-sm add-btn float-end'; plus.innerHTML='<i class="bi bi-plus-lg"></i>';
        plus.onclick=()=>openModal({doctor_id:doc.id, date:d});
        td.appendChild(plus);

        // render slots
        slots.filter(s=>s.doctor_id==doc.id && s.date===d)
          .filter(s=>{
            if (f.lokasi && f.lokasi !== s.lokasi) return false;
            if (f.type && f.type !== s.type) return false;
            if (f.status && f.status !== s.status) return false;
            return true;
          })
          .forEach(s=>{
            const chip = document.createElement('div');
            chip.className = 'slot '+s.type+(s.status==='libur'?' libur':'');
            chip.innerHTML = `<span class="dot"></span>${fmtTime(s.start)}–${fmtTime(s.end)} ${s.quota?`<span class="text-muted">(${s.quota})</span>`:''}
              <div class="dropdown ms-auto">
                <button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown"></button>
                <div class="dropdown-menu dropdown-menu-end">
                  <button class="dropdown-item" onclick='editSlot(${s.id})'><i class="bi bi-pencil me-2"></i>Edit</button>
                  <button class="dropdown-item" onclick='duplicateSlot(${s.id})'><i class="bi bi-copy me-2"></i>Duplikasi</button>
                  <button class="dropdown-item" onclick='changeQuota(${s.id})'><i class="bi bi-person-plus me-2"></i>Ubah Kuota</button>
                  <button class="dropdown-item" onclick='toggleActive(${s.id})'><i class="bi bi-power me-2"></i>${s.status==='aktif'?'Nonaktifkan':'Aktifkan'}</button>
                  <button class="dropdown-item" onclick='markHoliday(${s.id})'><i class="bi bi-flag me-2"></i>Tandai Libur</button>
                  <div class="dropdown-divider"></div>
                  <button class="dropdown-item text-danger" onclick='removeSlot(${s.id})'><i class="bi bi-trash me-2"></i>Hapus</button>
                </div>
              </div>`;
            td.appendChild(chip);
          });
        tr.appendChild(td);
      });
      body.appendChild(tr);
    });
    renderList();
  }

  function renderList(){
    const tbody = el('#listTable tbody'); tbody.innerHTML='';
    const f = currentFilter();
    slots.filter(s=>{
      if (f.doctor && +f.doctor !== +s.doctor_id) return false;
      if (f.poli && f.poli !== doctorById(s.doctor_id)?.poli) return false;
      if (f.lokasi && f.lokasi !== s.lokasi) return false;
      if (f.type && f.type !== s.type) return false;
      if (f.status && f.status !== s.status) return false;
      if (f.from && s.date < f.from) return false;
      if (f.to && s.date > f.to) return false;
      return true;
    }).sort((a,b)=> (a.date+a.start).localeCompare(b.date+b.start)).forEach(s=>{
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${doctorById(s.doctor_id)?.name}</td>
        <td>${s.date}</td>
        <td>${fmtTime(s.start)}–${fmtTime(s.end)}</td>
        <td>${s.quota ?? ''}</td>
        <td>${s.lokasi}</td>
        <td class="text-capitalize">${s.type}</td>
        <td><span class="badge-status ${s.status}">${s.status.toUpperCase()}</span></td>
        <td>${s.note ?? ''}</td>
        <td>
          <div class="btn-group btn-group-sm">
            <button class="btn btn-outline-primary" onclick="editSlot(${s.id})"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-outline-secondary" onclick="duplicateSlot(${s.id})"><i class="bi bi-copy"></i></button>
            <button class="btn btn-outline-danger" onclick="removeSlot(${s.id})"><i class="bi bi-trash"></i></button>
          </div>
        </td>`;
      tbody.appendChild(tr);
    });
  }

  function currentFilter(){
    return {
      doctor: el('#fDoctor').value,
      poli: el('#fPoli').value,
      lokasi: el('#fLokasi').value,
      type: el('#fType').value,
      status: el('#fStatus').value,
      from: null, to: null
    };
  }

  // ====== Week navigation
  el('#prevWeek').onclick = ()=>{ weekDates = weekDates.map(d=>dateAdd(d,-7)); updateWeekLabel(); renderCalendar(); }
  el('#nextWeek').onclick = ()=>{ weekDates = weekDates.map(d=>dateAdd(d, 7)); updateWeekLabel(); renderCalendar(); }
  function updateWeekLabel(){ el('#weekLabel').textContent = weekDates[0]+' – '+weekDates[6]; }

  // ====== View toggler
  el('#toggleView').onclick = ()=>{ el('#calendarWrap').classList.remove('d-none'); el('#listWrap').classList.add('d-none'); }
  el('#toggleViewList').onclick = ()=>{ el('#calendarWrap').classList.add('d-none'); el('#listWrap').classList.remove('d-none'); }

  // ====== Modal logic
  let slotModal = new bootstrap.Modal(document.getElementById('slotModal'));
  function openModal(seed={}){
    el('#slotForm').reset?.();
    el('#slotId').value = seed.id ?? '';
    el('#slotTitle').textContent = seed.id ? 'Edit Slot' : 'Tambah Slot';
    el('#fDoctorSel').value = seed.doctor_id ?? '';
    el('#fPoliSel').value = seed.doctor_id ? (doctorById(seed.doctor_id)?.poli || '') : '';
    el('#fDate').value = seed.date ?? weekDates[0];
    el('#fStart').value = seed.start ?? '08:00';
    el('#fEnd').value = seed.end ?? '10:00';
    el('#fQuota').value = seed.quota ?? '';
    el('#fLoc').value = seed.lokasi ?? (doctorById(seed.doctor_id||doctors[0].id)?.lokasi);
    el('#fTypeSel').value = seed.type ?? 'reguler';
    el('#fStatus').value = seed.status ?? 'aktif';
    el('#fNote').value = seed.note ?? '';
    el('#repeatWeekly').checked = false; el('#repeatFrom').value=''; el('#repeatTo').value=''; el('#exceptions').value='';
    el('#conflictBox').classList.add('d-none');
    slotModal.show();
  }
  el('#fDoctorSel').addEventListener('change', e=>{
    const d = doctorById(e.target.value);
    el('#fPoliSel').value = d ? d.poli : '';
    if (d) el('#fLoc').value = d.lokasi;
  });

  function checkConflict(seed){
    const {id, doctor_id, date, start, end} = seed;
    const found = slots.some(s =>
      s.doctor_id==doctor_id && s.date===date && s.id!=id &&
      s.status!=='libur' && seed.status!=='libur' &&
      overlaps(start, end, s.start, s.end)
    );
    el('#conflictBox').classList.toggle('d-none', !found);
    el('#btnSaveSlot').disabled = found;
  }

  ['fDoctorSel','fDate','fStart','fEnd','fStatus'].forEach(id=>{
    el('#'+id).addEventListener('input', ()=>{
      const seed = {
        id: el('#slotId').value || null,
        doctor_id: el('#fDoctorSel').value,
        date: el('#fDate').value,
        start: el('#fStart').value,
        end: el('#fEnd').value,
        status: el('#fStatus').value
      };
      if (seed.doctor_id && seed.date && seed.start && seed.end) checkConflict(seed);
    });
  });

  el('#slotForm').addEventListener('submit', e=>{
    e.preventDefault();
    const payload = {
      id: el('#slotId').value || Math.floor(Math.random()*1e6),
      doctor_id: +el('#fDoctorSel').value,
      date: el('#fDate').value,
      start: el('#fStart').value,
      end: el('#fEnd').value,
      quota: el('#fQuota').value? +el('#fQuota').value : null,
      lokasi: el('#fLoc').value,
      type: el('#fTypeSel').value,
      status: el('#fStatus').value,
      note: el('#fNote').value
    };

    // repeat rule
    if (el('#repeatWeekly').checked && el('#repeatFrom').value && el('#repeatTo').value){
      let cur = el('#repeatFrom').value;
      const stop = el('#repeatTo').value;
      const exceptions = el('#exceptions').value.split(',').map(s=>s.trim()).filter(Boolean);
      while (cur <= stop){
        const sameDow = (new Date(cur).getDay() === new Date(payload.date).getDay());
        if (sameDow && !exceptions.includes(cur)){
          slots.push({...payload, date: cur, id: Math.floor(Math.random()*1e9)});
        }
        cur = dateAdd(cur, 7);
      }
    } else {
      const idx = slots.findIndex(s=>s.id==payload.id);
      if (idx>-1) slots[idx] = payload; else slots.push(payload);
    }

    slotModal.hide();
    renderCalendar();
  });

  // ====== Quick actions
  window.editSlot = id => openModal(slots.find(s=>s.id==id));
  window.duplicateSlot = id => {
    const s = slots.find(x=>x.id==id);
    openModal({...s, id:'', date: s.date});
  };
  window.changeQuota = id => {
    const s = slots.find(x=>x.id==id);
    const q = prompt('Kuota baru:', s.quota ?? '');
    if (q===null) return; s.quota = q? +q : null; renderCalendar();
  };
  window.toggleActive = id => { const s=slots.find(x=>x.id==id); s.status = s.status==='aktif'?'libur':'aktif'; renderCalendar(); };
  window.markHoliday = id => { const s=slots.find(x=>x.id==id); s.status='libur'; s.note = s.note || 'Libur'; renderCalendar(); };
  window.removeSlot = id => { if(confirm('Hapus slot ini?')){ slots = slots.filter(s=>s.id!=id); renderCalendar(); } };

  // ====== Bulk tools
  el('#btnAdd').onclick = ()=>openModal({doctor_id:'', date:weekDates[0]});
  el('#btnCopy').onclick = ()=>{
    const nextWeek = weekDates.map(d=>dateAdd(d,7));
    const curSet = slots.filter(s=>weekDates.includes(s.date));
    curSet.forEach(s=>{
      const offset = weekDates.indexOf(s.date);
      slots.push({...s, id: Math.floor(Math.random()*1e9), date: nextWeek[offset]});
    });
    alert('Disalin ke minggu depan (demo).'); renderCalendar();
  };
  el('#btnImportCsv').onclick = ()=>{
    const text = el('#csvText').value.trim();
    if (!text) return;
    text.split(/\r?\n/).forEach(line=>{
      const [doctor_id,date,start,end,quota,location,type,status,note] = line.split(',');
      if (!doctor_id || !date) return;
      slots.push({
        id: Math.floor(Math.random()*1e9), doctor_id:+doctor_id, date:date.trim(),
        start:start.trim(), end:end.trim(), quota: quota? +quota : null,
        lokasi: (location||'').trim(), type:(type||'reguler').trim(), status:(status||'aktif').trim(), note:(note||'').trim()
      });
    });
    bootstrap.Modal.getInstance(document.getElementById('importModal')).hide();
    renderCalendar();
  };
  el('#btnMassDeactivate').onclick = ()=>{
    const from = el('#massFrom').value, to = el('#massTo').value, doc = el('#massDoctor').value, note = el('#massNote').value || 'Libur massal';
    slots.forEach(s=>{
      if ((!from || s.date>=from) && (!to || s.date<=to) && (!doc || +doc===+s.doctor_id)) {
        s.status='libur'; if (!s.note) s.note=note;
      }
    });
    bootstrap.Modal.getInstance(document.getElementById('deactivateModal')).hide();
    renderCalendar();
  };

  // ====== Init
  updateWeekLabel();
  renderCalendar();

  // buka modal otomatis jika datang dari /schedules/create
  @if(request('open')==='create')
    openModal({date: weekDates[0]});
  @endif
</script>
@endpush
