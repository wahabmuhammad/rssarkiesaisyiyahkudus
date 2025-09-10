@extends('components.layouts.admin')
@section('title','Dashboard')

@push('head')
<style>
  /* Komponen khusus halaman ini */
  .kpi{display:flex;gap:12px;align-items:center;padding:14px;border-radius:16px;background:#fff;border:1px solid rgba(0,0,0,.05);}
  .kpi .icon{width:44px;height:44px;border-radius:12px;display:grid;place-items:center;background:#e6f0ff;color:#1e40af;}
  .badge-soft{background:#e6f0ff;color:#1e40af;border-radius:999px;font-weight:600;}
  .mini-cal{display:grid;grid-template-columns:repeat(7,1fr);gap:12px}
  .mini-cal .day{background:#fff;border-radius:14px;padding:12px;border:1px solid rgba(0,0,0,.06)}
  .chip{display:inline-flex;align-items:center;gap:6px;border-radius:999px;padding:3px 8px;font-size:.75rem}
  .chip.free{background:#E7F8EE;color:#1f8b4c}
  .chip.conflict{background:#FFE8E8;color:#b42318}
  .chip.ok{background:#EEF2FF;color:#2563eb}
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .quick-card{border:1px dashed #a9c6ff;background:#fff;border-radius:16px}
  .quick-card:hover{border-style:solid;box-shadow:0 10px 24px rgba(42,109,247,.12)}
</style>
@endpush

@section('content')
@php
  // ====== DEMO DATA (nanti ganti dari controller) ======
  $kpi = $kpi ?? [
    'dokter_aktif'=>40,'poli'=>12,'jadwal_minggu_ini'=>118,'jadwal_batal_libur'=>6,'banner_aktif'=>3,'artikel_terjadwal'=>5,
  ];
  $sessions = $sessions ?? ['Jan'=>80,'Feb'=>92,'Mar'=>76,'Apr'=>88,'Mei'=>120,'Jun'=>150,'Jul'=>140,'Agu'=>110,'Sep'=>90,'Okt'=>95,'Nov'=>130,'Des'=>145];
  $topDoctors = $topDoctors ?? [
    ['name'=>'dr. A. Setiawan, Sp.PD','count'=>52],
    ['name'=>'dr. B. Kartika, Sp.OG','count'=>47],
    ['name'=>'dr. C. Rahman, Sp.THT','count'=>44],
    ['name'=>'dr. D. Sari, Sp.A','count'=>39],
    ['name'=>'dr. E. Putra, Sp.B','count'=>35],
  ];
  $notifications = $notifications ?? [
    ['icon'=>'bi-calendar2-x','title'=>'Perubahan jadwal','desc'=>"Jadwal dr. B. Kartika Jumat 15.00 dibatalkan (cuti).",'time'=>'Baru saja'],
    ['icon'=>'bi-hourglass-split','title'=>'Menunggu publikasi','desc'=>'Artikel “Tips Jaga Kesehatan Anak” menunggu review.','time'=>'15m'],
    ['icon'=>'bi-megaphone','title'=>'Banner aktif','desc'=>'Banner “Promo MCU September” aktif hingga 30 Sep.','time'=>'1h'],
  ];
  $week = $week ?? [
    ['day'=>'Sen','date'=>now()->startOfWeek()->format('d M'),'status'=>'ok','slots'=>18,'free'=>3,'conflict'=>0],
    ['day'=>'Sel','date'=>now()->startOfWeek()->addDay()->format('d M'),'status'=>'ok','slots'=>20,'free'=>2,'conflict'=>1],
    ['day'=>'Rab','date'=>now()->startOfWeek()->addDays(2)->format('d M'),'status'=>'konflik','slots'=>22,'free'=>1,'conflict'=>2],
    ['day'=>'Kam','date'=>now()->startOfWeek()->addDays(3)->format('d M'),'status'=>'ok','slots'=>16,'free'=>4,'conflict'=>0],
    ['day'=>'Jum','date'=>now()->startOfWeek()->addDays(4)->format('d M'),'status'=>'kosong','slots'=>10,'free'=>6,'conflict'=>0],
    ['day'=>'Sab','date'=>now()->startOfWeek()->addDays(5)->format('d M'),'status'=>'ok','slots'=>12,'free'=>2,'conflict'=>0],
    ['day'=>'Min','date'=>now()->startOfWeek()->addDays(6)->format('d M'),'status'=>'ok','slots'=>8,'free'=>3,'conflict'=>0],
  ];
@endphp

{{-- KPI --}}
<div class="row g-3 mb-4">
  <div class="col-6 col-md-4 col-xl-2"><div class="kpi"><div class="icon"><i class="bi bi-person-badge"></i></div><div><div class="text-muted small">Dokter Aktif</div><div class="h5 mb-0">{{ $kpi['dokter_aktif'] }}</div></div></div></div>
  <div class="col-6 col-md-4 col-xl-2"><div class="kpi"><div class="icon"><i class="bi bi-diagram-3"></i></div><div><div class="text-muted small">Poli/Departemen</div><div class="h5 mb-0">{{ $kpi['poli'] }}</div></div></div></div>
  <div class="col-6 col-md-4 col-xl-2"><div class="kpi"><div class="icon"><i class="bi bi-calendar-week"></i></div><div><div class="text-muted small">Jadwal Minggu Ini</div><div class="h5 mb-0">{{ $kpi['jadwal_minggu_ini'] }}</div></div></div></div>
  <div class="col-6 col-md-4 col-xl-2"><div class="kpi"><div class="icon"><i class="bi bi-calendar2-x"></i></div><div><div class="text-muted small">Batal/Libur</div><div class="h5 mb-0">{{ $kpi['jadwal_batal_libur'] }}</div></div></div></div>
  <div class="col-6 col-md-4 col-xl-2"><div class="kpi"><div class="icon"><i class="bi bi-aspect-ratio"></i></div><div><div class="text-muted small">Banner Aktif</div><div class="h5 mb-0">{{ $kpi['banner_aktif'] }}</div></div></div></div>
  <div class="col-6 col-md-4 col-xl-2"><div class="kpi"><div class="icon"><i class="bi bi-newspaper"></i></div><div><div class="text-muted small">Artikel Terjadwal</div><div class="h5 mb-0">{{ $kpi['artikel_terjadwal'] }}</div></div></div></div>
</div>

<div class="row g-4">
  {{-- Chart + Top Dokter --}}
  <div class="col-12 col-xl-8">
    <div class="card-soft mb-4">
      <div class="p-3 d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1">Sesi Praktik</h5>
          <div class="text-muted small">Jumlah sesi per bulan</div>
        </div>
        <select class="form-select form-select-sm" style="max-width:160px"><option>Per Bulan</option><option>Per Minggu</option></select>
      </div>
      <div class="px-3 pb-3"><canvas id="sessionsChart" height="110"></canvas></div>
    </div>

    <div class="card-soft">
      <div class="p-3 pb-2">
        <h5 class="mb-1">Top 5 Dokter dengan Jadwal Terbanyak</h5>
        <div class="text-muted small">Periode berjalan</div>
      </div>
      <div class="px-3 pb-3"><canvas id="topDoctorsChart" height="140"></canvas></div>
    </div>
  </div>

  {{-- Banner + Quick actions --}}
  <div class="col-12 col-xl-4">
    <div class="card-soft text-white mb-4" style="background:linear-gradient(135deg,#2563eb 0%,#1d4ed8 100%);">
      <div class="p-4">
        <span class="badge bg-light text-primary fw-semibold mb-3">BARU</span>
        <h4 class="fw-bold">Template artikel & banner baru!</h4>
        <p class="opacity-75">Gunakan template untuk mempercepat pembuatan konten.</p>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-light fw-semibold rounded-pill px-4">Buat Konten</a>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-6"><a href="{{ route('admin.doctors.create') }}" class="btn w-100 quick-card p-3 text-start"><i class="bi bi-person-plus me-2"></i> Tambah Dokter</a></div>
      <div class="col-6"><a href="{{ route('admin.schedules.create') }}" class="btn w-100 quick-card p-3 text-start"><i class="bi bi-calendar-plus me-2"></i> Tambah Jadwal</a></div>
      <div class="col-6"><a href="{{ route('admin.articles.create') }}" class="btn w-100 quick-card p-3 text-start"><i class="bi bi-newspaper me-2"></i> Tambah Artikel</a></div>
      <div class="col-6"><a href="{{ route('admin.hero.create') }}" class="btn w-100 quick-card p-3 text-start"><i class="bi bi-aspect-ratio me-2"></i> Tambah Banner</a></div>
    </div>
  </div>

  {{-- Notifikasi --}}
  <div class="col-12 col-xl-6">
    <div class="card-soft">
      <div class="p-3 pb-2">
        <h5 class="mb-1">Notifikasi Terbaru</h5>
        <div class="text-muted small">Perubahan jadwal & konten menunggu publikasi</div>
      </div>
      <div class="list-group list-group-flush">
        @foreach($notifications as $n)
          <div class="list-group-item d-flex align-items-start gap-3">
            <div class="rounded-3 bg-light p-2 text-primary"><i class="bi {{ $n['icon'] }} fs-5"></i></div>
            <div class="flex-grow-1">
              <div class="fw-semibold">{{ $n['title'] }}</div>
              <div class="small text-muted">{{ $n['desc'] }}</div>
            </div>
            <small class="text-muted">{{ $n['time'] }}</small>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  {{-- Kalender mini --}}
  <div class="col-12 col-xl-6">
    <div class="card-soft">
      <div class="p-3 pb-2 d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1">Kalender Mini (Mingguan)</h5>
          <div class="text-muted small">Highlight slot kosong & konflik</div>
        </div>
        <a href="{{ route('admin.schedules.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">Kelola Jadwal</a>
      </div>
      <div class="p-3">
        <div class="mini-cal">
          @foreach ($week as $d)
            <div class="day">
              <h6 class="d-flex justify-content-between">
                <span>{{ $d['day'] }}</span><span class="text-muted small">{{ $d['date'] }}</span>
              </h6>
              <div class="mt-2">
                <div class="small text-muted">Sesi: <strong>{{ $d['slots'] }}</strong></div>
                <div class="d-flex gap-2 mt-2 flex-wrap">
                  <span class="chip {{ $d['status']=='ok' ? 'ok' : ($d['status']=='kosong' ? 'free' : 'conflict') }}">{{ ucfirst($d['status']) }}</span>
                  <span class="chip free">Kosong {{ $d['free'] }}</span>
                  @if($d['conflict']>0)<span class="chip conflict">Konflik {{ $d['conflict'] }}</span>@endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="mt-3 small text-muted">Klik hari di kalender utama untuk detail penjadwalan.</div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
  const sessions = @json(array_values($sessions));
  const sessionLabels = @json(array_keys($sessions));
  const topDocLabels = @json(collect($topDoctors)->pluck('name'));
  const topDocCounts = @json(collect($topDoctors)->pluck('count'));

  new Chart(document.getElementById('sessionsChart'), {
    type:'bar',
    data:{ labels:sessionLabels, datasets:[{ label:'Sesi', data:sessions, borderWidth:1 }] },
    options:{ responsive:true, plugins:{legend:{display:false}}, scales:{ y:{beginAtZero:true,grid:{drawBorder:false}}, x:{grid:{display:false}} } }
  });

  new Chart(document.getElementById('topDoctorsChart'), {
    type:'bar',
    data:{ labels:topDocLabels, datasets:[{ label:'Jumlah Jadwal', data:topDocCounts, borderWidth:1 }] },
    options:{ indexAxis:'y', responsive:true, plugins:{legend:{display:false}},
      scales:{ x:{beginAtZero:true,grid:{drawBorder:false}}, y:{grid:{display:false}} } }
  });
</script>
@endpush
