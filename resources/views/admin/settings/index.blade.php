@extends('components.layouts.admin')
@section('title','Pengaturan')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .nav-pills .nav-link{border-radius:10px}
  .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
  .img-prev{width:100%;max-height:160px;object-fit:contain;border:1px solid #e5e7eb;border-radius:12px;background:#fff}
  .og-prev{width:100%;max-height:220px;object-fit:cover;border:1px solid #e5e7eb;border-radius:12px;background:#fff}
  .help{font-size:.85rem;color:#6b7280}
  .table-hours input[type=time]{width:140px}
  .role-badge{border-radius:999px;padding:.15rem .5rem;border:1px solid #e5e7eb;background:#f8fafc}
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">Pengaturan</h3>
    <div class="text-muted">Profil RS, kontak & sosial, SEO, notifikasi, pengguna & cache/publish.</div>
  </div>
  <div class="btn-group">
    <button class="btn btn-outline-secondary" id="btnExport"><i class="bi bi-download me-1"></i> Backup (Export)</button>
    <label class="btn btn-outline-secondary mb-0">
      <i class="bi bi-upload me-1"></i> Restore
      <input type="file" id="importJson" accept="application/json" hidden>
    </label>
    <button class="btn btn-primary" id="btnPublish"><i class="bi bi-rocket-takeoff me-1"></i> Publish Changes</button>
  </div>
</div>

<div class="card card-soft mb-3">
  <div class="card-body">
    <ul class="nav nav-pills flex-wrap gap-2" id="settingTabs" role="tablist">
      <li class="nav-item" role="presentation"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tabProfile" type="button">Profil RS</button></li>
      <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabSocial" type="button">Sosial & Kontak Cepat</button></li>
      <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabSEO" type="button">SEO & Integrasi</button></li>
      <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabNotif" type="button">Notifikasi</button></li>
      <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabUsers" type="button">Users & Roles</button></li>
      <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tabCache" type="button">Cache / Publish</button></li>
    </ul>
  </div>
</div>

<div class="tab-content">

  {{-- ========== PROFIL RS ========== --}}
  <div class="tab-pane fade show active" id="tabProfile">
    <form id="formProfile" class="card card-soft">
      @csrf
      <div class="card-body">
        <h5 class="mb-3">Profil RS</h5>
        <div class="row g-3">
          <div class="col-lg-6">
            <label class="form-label">Nama Resmi</label>
            <input name="name" class="form-control" placeholder="RS ...">
          </div>
          <div class="col-lg-6">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" placeholder="info@contoh.rs">
          </div>
          <div class="col-lg-12">
            <label class="form-label">Alamat</label>
            <textarea name="address" class="form-control" rows="2"></textarea>
          </div>

          <div class="col-lg-6">
            <label class="form-label">Koordinat Peta</label>
            <div class="grid-2">
              <input name="lat" class="form-control" placeholder="-6.2 (lat)">
              <input name="lng" class="form-control" placeholder="106.8 (lng)">
            </div>
            <div class="help mt-1">Isi lat & lng untuk embed peta otomatis.</div>
            <a id="mapPreview" href="#" target="_blank" class="small d-none">Preview peta</a>
          </div>

          <div class="col-lg-6">
            <label class="form-label">Telepon</label>
            <div class="grid-2">
              <input name="tel_pendaftaran" class="form-control" placeholder="Pendaftaran">
              <input name="tel_callcenter" class="form-control" placeholder="Call Center">
              <input name="tel_pengaduan" class="form-control" placeholder="Pengaduan">
              <input name="tel_umum" class="form-control" placeholder="Umum (ops)">
            </div>
          </div>

          <div class="col-lg-12">
            <label class="form-label">Jam Operasional</label>
            <div class="table-responsive">
              <table class="table table-hours">
                <thead><tr><th>Hari</th><th>Buka</th><th>Tutup</th><th>Keterangan</th></tr></thead>
                <tbody>
                  @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $d)
                  <tr>
                    <td style="width:140px">{{ $d }}</td>
                    <td><input type="time" class="form-control" name="open_{{ strtolower($d) }}" value="08:00"></td>
                    <td><input type="time" class="form-control" name="close_{{ strtolower($d) }}" value="16:00"></td>
                    <td><input class="form-control" name="note_{{ strtolower($d) }}" placeholder="opsional"></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
      <div class="card-footer d-flex justify-content-end gap-2">
        <button class="btn btn-outline-primary btnSave" data-form="formProfile" type="button">Simpan Profil</button>
      </div>
    </form>
  </div>

  {{-- ========== SOSIAL & KONTAK CEPAT ========== --}}
  <div class="tab-pane fade" id="tabSocial">
    <form id="formSocial" class="card card-soft">
      <div class="card-body">
        <h5 class="mb-3">Sosial & Kontak Cepat</h5>
        <div class="row g-3">
          <div class="col-lg-6">
            <label class="form-label">WhatsApp Pendaftaran</label>
            <input name="wa_reg" class="form-control" placeholder="+62...">
          </div>
          <div class="col-lg-6">
            <label class="form-label">WhatsApp Keluhan</label>
            <input name="wa_keluhan" class="form-control" placeholder="+62...">
          </div>
          <div class="col-lg-4">
            <label class="form-label">Instagram</label>
            <input name="ig" class="form-control" placeholder="https://instagram.com/...">
          </div>
          <div class="col-lg-4">
            <label class="form-label">Facebook</label>
            <input name="fb" class="form-control" placeholder="https://facebook.com/...">
          </div>
          <div class="col-lg-4">
            <label class="form-label">YouTube</label>
            <input name="yt" class="form-control" placeholder="https://youtube.com/@...">
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end gap-2">
        <button class="btn btn-outline-primary btnSave" data-form="formSocial" type="button">Simpan Sosial/Kontak</button>
      </div>
    </form>
  </div>

  {{-- ========== SEO & INTEGRASI ========== --}}
  <div class="tab-pane fade" id="tabSEO">
    <form id="formSEO" class="card card-soft" enctype="multipart/form-data">
      <div class="card-body">
        <h5 class="mb-3">SEO & Integrasi</h5>
        <div class="row g-3">
          <div class="col-lg-4">
            <label class="form-label">Google Analytics ID</label>
            <input name="ga_id" class="form-control" placeholder="G-XXXXXXXXXX">
          </div>
          <div class="col-lg-4">
            <label class="form-label">Google Tag Manager ID</label>
            <input name="gtm_id" class="form-control" placeholder="GTM-XXXXXXX">
          </div>
          <div class="col-lg-4">
            <label class="form-label">Sitemap URL</label>
            <input name="sitemap" class="form-control" placeholder="/sitemap.xml">
          </div>

          <div class="col-lg-4">
            <label class="form-label">Favicon</label>
            <input type="file" id="faviconInp" accept="image/*" class="form-control">
            <img id="faviconPrev" class="img-prev mt-2" onerror="this.style.display='none'">
          </div>
          <div class="col-lg-8">
            <label class="form-label">Open Graph Image (Share)</label>
            <input type="file" id="ogInp" accept="image/*" class="form-control">
            <img id="ogPrev" class="og-prev mt-2" onerror="this.style.display='none'">
          </div>

          <div class="col-lg-6">
            <label class="form-label">robots.txt</label>
            <textarea name="robots" class="form-control" rows="8">User-agent: *
Disallow:
Sitemap: /sitemap.xml</textarea>
          </div>
          <div class="col-lg-6">
            <label class="form-label">Tambahan meta tag (opsional)</label>
            <textarea name="extra_meta" class="form-control" rows="8" placeholder="&lt;meta name=&quot;theme-color&quot; content=&quot;#1E88E5&quot;&gt;"></textarea>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end gap-2">
        <button class="btn btn-outline-secondary" type="button" id="regenSitemap"><i class="bi bi-diagram-3 me-1"></i> Regenerate sitemap (demo)</button>
        <button class="btn btn-outline-primary btnSave" data-form="formSEO" type="button">Simpan SEO</button>
      </div>
    </form>
  </div>

  {{-- ========== NOTIFIKASI ========== --}}
  <div class="tab-pane fade" id="tabNotif">
    <form id="formNotif" class="card card-soft">
      <div class="card-body">
        <h5 class="mb-3">Notifikasi (Opsional)</h5>
        <div class="alert alert-info small">
          Template untuk pengumuman jadwal libur dokter. Variabel yang tersedia:
          <code>{doctor_name}</code>, <code>{date}</code>, <code>{reason}</code>, <code>{poli}</code>, <code>{hospital_name}</code>.
        </div>
        <div class="row g-3">
          <div class="col-lg-6">
            <label class="form-label">Email Subject</label>
            <input name="email_subject" class="form-control" placeholder="[INFO] Libur praktik {doctor_name} ({date})">
          </div>
          <div class="col-lg-6">
            <label class="form-label">WA Template</label>
            <input name="wa_template" class="form-control" placeholder="dr. {doctor_name} libur {date} ({reason}). Info: {hospital_name}">
          </div>
          <div class="col-lg-12">
            <label class="form-label">Email Body (HTML)</label>
            <textarea name="email_body" class="form-control" rows="8" placeholder="<p>Yth. Pasien, ...</p>"></textarea>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end gap-2">
        <button class="btn btn-outline-secondary" type="button" id="previewNotif"><i class="bi bi-eye me-1"></i> Preview</button>
        <button class="btn btn-outline-primary btnSave" data-form="formNotif" type="button">Simpan Template</button>
      </div>
    </form>
  </div>

  {{-- ========== USERS & ROLES ========== --}}
  <div class="tab-pane fade" id="tabUsers">
    <div class="card card-soft">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Users & Roles</h5>
          <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#inviteModal"><i class="bi bi-person-plus me-1"></i> Undang Pengguna</button>
        </div>

        @php
          // demo data
          $users = [
            ['id'=>1,'name'=>'Super Admin','email'=>'superadmin@gmail.com','role'=>'Admin','active'=>true],
            ['id'=>2,'name'=>'Editor Konten','email'=>'editor@rs.co.id','role'=>'Editor','active'=>true],
            ['id'=>3,'name'=>'Scheduler','email'=>'scheduler@rs.co.id','role'=>'Scheduler','active'=>false],
          ];
          $roles = ['Admin','Editor','Scheduler'];
        @endphp

        <div class="table-responsive">
          <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Email</th><th>Role</th><th>Status</th><th style="width:120px">Aksi</th></tr></thead>
            <tbody id="userRows">
              @foreach($users as $u)
              <tr data-id="{{ $u['id'] }}">
                <td class="fw-semibold">{{ $u['name'] }}</td>
                <td class="small">{{ $u['email'] }}</td>
                <td>
                  <select class="form-select form-select-sm roleSel" style="max-width:160px">
                    @foreach($roles as $r) <option @selected($u['role']===$r)>{{ $r }}</option> @endforeach
                  </select>
                </td>
                <td>
                  <span class="role-badge">{{ $u['active'] ? 'Aktif' : 'Nonaktif' }}</span>
                </td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-secondary btnToggleUser">{{ $u['active'] ? 'Nonaktifkan' : 'Aktifkan' }}</button>
                    <button class="btn btn-outline-danger btnDelUser"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="alert alert-warning small mt-3 mb-0">
          <strong>Roles:</strong>
          <span class="ms-2"><b>Admin</b> = semua akses (jadwal + konten + pengaturan).</span>
          <span class="ms-2"><b>Editor</b> = konten saja (artikel, hero, layanan, dsb).</span>
          <span class="ms-2"><b>Scheduler</b> = jadwal dokter saja.</span>
        </div>
      </div>
    </div>

    {{-- Modal Undang --}}
    <div class="modal fade" id="inviteModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form class="modal-content" id="inviteForm">
          <div class="modal-header"><h5 class="modal-title">Undang Pengguna</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
          <div class="modal-body">
            <div class="mb-2"><label class="form-label">Nama</label><input class="form-control" name="name" required></div>
            <div class="mb-2"><label class="form-label">Email</label><input class="form-control" name="email" type="email" required></div>
            <div class="mb-2"><label class="form-label">Role</label>
              <select class="form-select" name="role">
                <option>Admin</option><option>Editor</option><option>Scheduler</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-secondary" data-bs-dismiss="modal" type="button">Batal</button>
            <button class="btn btn-primary" type="submit">Kirim Undangan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- ========== CACHE / PUBLISH ========== --}}
  <div class="tab-pane fade" id="tabCache">
    <div class="card card-soft">
      <div class="card-body">
        <h5 class="mb-3">Cache / Publish</h5>
        <div class="row g-3">
          <div class="col-md-4">
            <div class="p-3 border rounded-3">
              <h6>Publish Changes</h6>
              <p class="text-muted small">Apply seluruh perubahan konten & pengaturan.</p>
              <button class="btn btn-primary w-100" id="btnPublish2"><i class="bi bi-rocket-takeoff me-1"></i> Publish</button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-3 border rounded-3">
              <h6>Clear Cache</h6>
              <p class="text-muted small">Bersihkan cache view, route, config (demo front-end).</p>
              <button class="btn btn-outline-danger w-100" id="btnClearCache"><i class="bi bi-trash3 me-1"></i> Clear Cache</button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-3 border rounded-3">
              <h6>Backup / Restore</h6>
              <p class="text-muted small">Export semua field halaman ini ke JSON; restore dari file JSON.</p>
              <div class="btn-group w-100">
                <button class="btn btn-outline-secondary" id="btnExport2"><i class="bi bi-download me-1"></i> Backup</button>
                <label class="btn btn-outline-secondary mb-0">
                  <i class="bi bi-upload me-1"></i> Restore
                  <input type="file" id="importJson2" accept="application/json" hidden>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="alert alert-info small mt-3 mb-0">Semua tombol di sini masih <em>demo UI</em>. Nanti di-backend tinggal dipetakan ke endpoint artisan / job publish, clear cache, backup/restore.</div>
      </div>
    </div>
  </div>

</div> {{-- /tab-content --}}
@endsection

@push('scripts')
<script>
// ===== Helpers
const $ = (q, s=document)=>s.querySelector(q);
const $$= (q, s=document)=>[...s.querySelectorAll(q)];
const toast = (msg)=>{ alert(msg); };

// ===== Preview peta dari lat/lng
['formProfile'].forEach(fid=>{
  const f = document.getElementById(fid);
  f?.addEventListener('input', e=>{
    const lat = f.querySelector('[name=lat]')?.value.trim();
    const lng = f.querySelector('[name=lng]')?.value.trim();
    const link = $('#mapPreview');
    if(lat && lng){ link.classList.remove('d-none'); link.href = `https://maps.google.com/?q=${lat},${lng}`; }
    else { link.classList.add('d-none'); }
  });
});

// ===== Image previews
$('#faviconInp')?.addEventListener('change', e=>{
  const f=e.target.files?.[0]; if(!f) return; $('#faviconPrev').src=URL.createObjectURL(f); $('#faviconPrev').style.display='block';
});
$('#ogInp')?.addEventListener('change', e=>{
  const f=e.target.files?.[0]; if(!f) return; $('#ogPrev').src=URL.createObjectURL(f); $('#ogPrev').style.display='block';
});

// ===== Dummy save per form
$$('.btnSave').forEach(btn=>{
  btn.addEventListener('click', ()=>{
    const formId = btn.dataset.form; const form = document.getElementById(formId);
    const data = Object.fromEntries(new FormData(form).entries());
    console.log('SAVE', formId, data);
    toast('Tersimpan (demo).');
  });
});

// ===== Sitemap regenerate (demo)
$('#regenSitemap')?.addEventListener('click', ()=>{ console.log('Regenerate sitemap'); toast('Sitemap digenerate (demo).'); });

// ===== Notif preview
$('#previewNotif')?.addEventListener('click', ()=>{
  const f = $('#formNotif');
  const vars = {doctor_name:'Budi', date:'2025-09-10', reason:'Libur nasional', poli:'Penyakit Dalam', hospital_name: ($('[name=name]')?.value || 'RS Contoh')};
  const sub = (f.email_subject.value || '').replace(/{(\w+)}/g, (_,k)=>vars[k]||'');
  const wa  = (f.wa_template.value || '').replace(/{(\w+)}/g, (_,k)=>vars[k]||'');
  const body= (f.email_body.value || '').replace(/{(\w+)}/g, (_,k)=>vars[k]||'');
  alert('Preview:\n\nSUBJECT: '+sub+'\n\nWA: '+wa+'\n\nBODY:\n'+body);
});

// ===== Users demo
$('#inviteForm')?.addEventListener('submit', (e)=>{
  e.preventDefault();
  const fd = Object.fromEntries(new FormData(e.target).entries());
  const tr = document.createElement('tr');
  tr.innerHTML = `<td class="fw-semibold">${fd.name}</td>
    <td class="small">${fd.email}</td>
    <td><select class="form-select form-select-sm roleSel" style="max-width:160px"><option ${fd.role==='Admin'?'selected':''}>Admin</option><option ${fd.role==='Editor'?'selected':''}>Editor</option><option ${fd.role==='Scheduler'?'selected':''}>Scheduler</option></select></td>
    <td><span class="role-badge">Aktif</span></td>
    <td><div class="btn-group btn-group-sm"><button class="btn btn-outline-secondary btnToggleUser">Nonaktifkan</button><button class="btn btn-outline-danger btnDelUser"><i class="bi bi-trash"></i></button></div></td>`;
  $('#userRows').appendChild(tr);
  bootstrap.Modal.getInstance(document.getElementById('inviteModal')).hide();
});

document.addEventListener('click', (e)=>{
  if(e.target.classList.contains('btnToggleUser')){
    const badge = e.target.closest('tr').querySelector('.role-badge');
    if(badge.textContent.trim()==='Aktif'){ badge.textContent='Nonaktif'; e.target.textContent='Aktifkan'; }
    else{ badge.textContent='Aktif'; e.target.textContent='Nonaktifkan'; }
  }
  if(e.target.classList.contains('btnDelUser')){
    if(confirm('Hapus pengguna ini?')) e.target.closest('tr').remove();
  }
});

// ===== Publish / Cache (demo)
const doPublish = ()=>{ console.log('PUBLISH ALL'); toast('Perubahan dipublish (demo).'); };
$('#btnPublish')?.addEventListener('click', doPublish);
$('#btnPublish2')?.addEventListener('click', doPublish);
$('#btnClearCache')?.addEventListener('click', ()=>{ console.log('CLEAR CACHE'); toast('Cache dibersihkan (demo).'); });

// ===== Backup / Restore JSON (demo, kumpulkan semua field di halaman ini)
function collectAll(){
  const data = {};
  $$('form').forEach(f=>{
    const fd = new FormData(f);
    // include files names only for demo
    f.querySelectorAll('input[type=file]').forEach(inp=>{
      if(inp.files?.[0]) fd.set(inp.name||inp.id, inp.files[0].name);
    });
    data[f.id || f.getAttribute('data-key') || ('form'+Math.random())] = Object.fromEntries(fd.entries());
  });
  return data;
}
function downloadJSON(obj, filename){
  const url = URL.createObjectURL(new Blob([JSON.stringify(obj,null,2)], {type:'application/json'}));
  const a = document.createElement('a'); a.href = url; a.download = filename; a.click(); URL.revokeObjectURL(url);
}
$('#btnExport')?.addEventListener('click', ()=> downloadJSON(collectAll(), 'settings-backup.json'));
$('#btnExport2')?.addEventListener('click', ()=> downloadJSON(collectAll(), 'settings-backup.json'));
const handleImport = (file)=>{
  const r = new FileReader();
  r.onload = ()=>{
    try{
      const obj = JSON.parse(r.result);
      // simple restore (isi field yang namanya sama)
      Object.values(obj).forEach(map=>{
        Object.entries(map).forEach(([k,v])=>{
          const el = document.querySelector(`[name="${CSS.escape(k)}"]`);
          if(el){ el.value = v; el.dispatchEvent(new Event('input')); }
        });
      });
      toast('Restore selesai (demo).');
    }catch(e){ alert('File tidak valid'); }
  };
  r.readAsText(file);
};
$('#importJson')?.addEventListener('change', e=> e.target.files[0] && handleImport(e.target.files[0]));
$('#importJson2')?.addEventListener('change', e=> e.target.files[0] && handleImport(e.target.files[0]));
</script>
@endpush
