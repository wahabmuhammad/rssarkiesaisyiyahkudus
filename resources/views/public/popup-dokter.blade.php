{{-- resources/views/public/partials/popup-dokter.blade.php --}}
@once
  <style>
    /* Pastikan hero jadi konteks positioning */
    #hero{ position: relative; }

    /* Tombol nempel di DALAM hero saja (bukan viewport) */
    .doctor-fab{
      position:absolute; left:16px; top:50%; transform:translateY(-50%);
      z-index: 5;
      padding:.625rem .9rem; border-radius:999px; display:flex; align-items:center; gap:.5rem;
      box-shadow:0 8px 24px rgba(0,0,0,.18); font-weight:600;
    }
    .doctor-fab .bi{ font-size:1.1rem; }

    /* Di mobile: geser ke bawah kiri dalam area hero */
    @media (max-width: 991.98px){
      .doctor-fab{ top:auto; bottom:16px; transform:none; }
    }

    /* Panel offcanvas */
    .offcanvas-dokter{ width:min(380px, 92vw); }

    .doc-card{
      display:flex; align-items:center; gap:.75rem; padding:.6rem .25rem;
      border-bottom:1px solid rgba(0,0,0,.06);
    }
    .doc-card:last-child{ border-bottom:none; }
    .doc-avatar{ width:48px; height:48px; border-radius:50%; object-fit:cover; background:#f3f5f7; }
    .doc-meta small{ display:block; opacity:.75; }

    .sticky-actions{
      position:sticky; bottom:0; background:#fff; padding:.75rem 0 .25rem;
      border-top:1px solid rgba(0,0,0,.08);
    }
  </style>
@endonce

<!-- ======= Tombol trigger (LETakkan DI DALAM #hero) ======= -->
<button id="btnPopupDokter"
        class="btn btn-primary doctor-fab"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#ocDokter"
        aria-controls="ocDokter">
  <i class="bi bi-person-heart"></i>
  <span>Dokter</span>
</button>

<!-- Offcanvas boleh di mana saja (di bawah hero atau di layout) -->
<div class="offcanvas offcanvas-start offcanvas-dokter" tabindex="-1" id="ocDokter" aria-labelledby="ocDokterLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title fw-bold" id="ocDokterLabel">Layanan Dokter</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
  </div>

  <div class="offcanvas-body">
    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="dokterTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab-list" data-bs-toggle="tab" data-bs-target="#pane-list" type="button" role="tab" aria-controls="pane-list" aria-selected="true">
          List Dokter
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-jadwal" data-bs-toggle="tab" data-bs-target="#pane-jadwal" type="button" role="tab" aria-controls="pane-jadwal" aria-selected="false">
          Jadwal Dokter
        </button>
      </li>
    </ul>

    <div class="tab-content">
      {{-- TAB: LIST DOKTER --}}
      <div class="tab-pane fade show active" id="pane-list" role="tabpanel" aria-labelledby="tab-list">
        <div class="row g-2 mb-3">
          <div class="col-12">
            <input id="searchDokter" type="text" class="form-control" placeholder="Cari nama dokter…">
          </div>
          <div class="col-12">
            <select id="filterSpesialis" class="form-select">
              <option value="">Semua Spesialis</option>
              <option value="Penyakit Dalam">Penyakit Dalam</option>
              <option value="Anak">Anak</option>
              <option value="Bedah Umum">Bedah Umum</option>
              <option value="Obgyn">Obgyn</option>
            </select>
          </div>
        </div>

        <div id="listDokter" class="mb-3" aria-live="polite">
          @isset($doctors)
            @foreach($doctors as $doc)
              <div class="doc-card" data-name="{{ Str::lower($doc->name) }}" data-spesialis="{{ $doc->spesialis }}">
                <img class="doc-avatar" src="{{ $doc->photo_url ?? asset('assets/img/doctor-placeholder.png') }}" alt="Foto {{ $doc->name }}">
                <div class="doc-meta flex-fill">
                  <strong>{{ $doc->name }}</strong>
                  <small>{{ $doc->spesialis }}</small>
                  <div class="d-flex gap-2 mt-2">
                    <button class="btn btn-sm btn-primary btn-lihat-jadwal" data-id="{{ $doc->id }}" data-name="{{ $doc->name }}">Lihat Jadwal</button>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            @php
              $demo = [
                ['id'=>1,'name'=>'dr. Aulia, Sp.PD','sp'=>'Penyakit Dalam'],
                ['id'=>2,'name'=>'dr. Bima, Sp.A','sp'=>'Anak'],
                ['id'=>3,'name'=>'dr. Citra, Sp.B','sp'=>'Bedah Umum'],
              ];
            @endphp
            @foreach($demo as $doc)
              <div class="doc-card" data-name="{{ Str::lower($doc['name']) }}" data-spesialis="{{ $doc['sp'] }}">
                <img class="doc-avatar" src="{{ asset('assets/img/doctor-placeholder.png') }}" alt="Foto {{ $doc['name'] }}">
                <div class="doc-meta flex-fill">
                  <strong>{{ $doc['name'] }}</strong>
                  <small>{{ $doc['sp'] }}</small>
                  <div class="d-flex gap-2 mt-2">
                    <button class="btn btn-sm btn-primary btn-lihat-jadwal" data-id="{{ $doc['id'] }}" data-name="{{ $doc['name'] }}">Lihat Jadwal</button>
                  </div>
                </div>
              </div>
            @endforeach
          @endisset
        </div>

        <div class="sticky-actions">
          <a href="{{ url('/dokter') }}" class="btn btn-outline-secondary w-100">Lihat semua dokter</a>
        </div>
      </div>

      {{-- TAB: JADWAL DOKTER --}}
      <div class="tab-pane fade" id="pane-jadwal" role="tabpanel" aria-labelledby="tab-jadwal">
        <div id="jadwalHeader" class="mb-2 d-none">
          <div class="small text-muted">Jadwal untuk:</div>
          <div class="fw-semibold" id="jadwalNamaDokter">-</div>
        </div>

        <div id="jadwalKosong" class="text-center py-4">
          <div class="mb-2">Pilih dokter dari tab <strong>List Dokter</strong> untuk melihat jadwal.</div>
          <a href="{{ url('/jadwal-dokter') }}" class="btn btn-outline-secondary btn-sm">Lihat halaman jadwal penuh</a>
        </div>

        <div id="jadwalKonten" class="d-none">
          <div class="table-responsive mb-3">
            <table class="table table-sm align-middle mb-0">
              <thead>
                <tr class="table-light">
                  <th>Hari</th><th>Jam</th><th>Poli</th><th>Keterangan</th>
                </tr>
              </thead>
              <tbody id="jadwalTbody"></tbody>
            </table>
          </div>
          <a id="ctaJadwalPenuh" href="{{ url('/jadwal-dokter') }}" class="btn btn-primary w-100">Lihat jadwal penuh</a>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
(function(){
  const $search = document.getElementById('searchDokter');
  const $filter = document.getElementById('filterSpesialis');
  const $list = document.getElementById('listDokter');

  function applyFilter(){
    const q = ($search?.value || '').trim().toLowerCase();
    const sp = ($filter?.value || '').trim();
    $list?.querySelectorAll('.doc-card').forEach(el=>{
      const name = el.getAttribute('data-name') || '';
      const spes = el.getAttribute('data-spesialis') || '';
      const okName = !q || name.includes(q);
      const okSpes = !sp || spes === sp;
      el.style.display = (okName && okSpes) ? '' : 'none';
    });
  }
  $search?.addEventListener('input', applyFilter);
  $filter?.addEventListener('change', applyFilter);

  const jadwalTabBtn = document.querySelector('#tab-jadwal');
  const jadwalNama = document.getElementById('jadwalNamaDokter');
  const jadwalHeader = document.getElementById('jadwalHeader');
  const jadwalKosong = document.getElementById('jadwalKosong');
  const jadwalKonten = document.getElementById('jadwalKonten');
  const jadwalTbody = document.getElementById('jadwalTbody');
  const ctaJadwalPenuh = document.getElementById('ctaJadwalPenuh');

  function getDemoJadwal(dokterId){
    const presets = {
      1: [
        {hari:'Senin', jam:'08:00–11:00', poli:'Penyakit Dalam', ket:'Onsite'},
        {hari:'Rabu',  jam:'13:00–15:00', poli:'Penyakit Dalam', ket:'Kuota terbatas'},
      ],
      2: [
        {hari:'Selasa', jam:'09:00–12:00', poli:'Anak', ket:'Onsite'},
        {hari:'Kamis',  jam:'10:00–12:00', poli:'Anak', ket:'Onsite'},
      ],
      3: [
        {hari:'Jumat', jam:'08:00–10:00', poli:'Bedah Umum', ket:'Onsite'},
      ]
    };
    return presets[dokterId] || [];
  }

  function fillJadwal(dokterId, dokterName){
    const rows = getDemoJadwal(Number(dokterId));
    jadwalTbody.innerHTML = rows.map(r=>(
      `<tr><td>${r.hari}</td><td>${r.jam}</td><td>${r.poli}</td><td>${r.ket}</td></tr>`
    )).join('') || `<tr><td colspan="4" class="text-center text-muted">Belum ada jadwal.</td></tr>`;

    jadwalNama.textContent = dokterName || '—';
    jadwalHeader.classList.remove('d-none');
    jadwalKonten.classList.remove('d-none');
    jadwalKosong.classList.add('d-none');

    if (ctaJadwalPenuh){
      const base = "{{ url('/jadwal-dokter') }}";
      ctaJadwalPenuh.href = `${base}?dokter=${encodeURIComponent(dokterId)}`;
    }
  }

  $list?.addEventListener('click', (e)=>{
    const btn = e.target.closest('.btn-lihat-jadwal');
    if(!btn) return;
    const id = btn.getAttribute('data-id');
    const name = btn.getAttribute('data-name');

    if (jadwalTabBtn){ new bootstrap.Tab(jadwalTabBtn).show(); }
    fillJadwal(id, name);
  });
})();
</script>
@endpush
