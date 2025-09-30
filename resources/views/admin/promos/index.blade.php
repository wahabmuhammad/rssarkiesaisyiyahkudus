@extends('components.layouts.admin')
@section('title','Promo')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .clamp-3{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
  .thumb{width:140px;height:70px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb}
</style>
@endpush

@section('content')
@php
  // ====== DATA DEMO (nanti ganti dari DB) ======
  $promos = $promos ?? [
    [
      'id'=>1,
      'title'=>'Promo Diskon Medical Check Up 20%',
      'banner'=>asset('assets/img/sample/promo1.jpg'),
      'desc_html'=>'Nikmati potongan harga 20% untuk paket MCU lengkap sepanjang bulan ini. Syarat & ketentuan berlaku…',
    ],
    [
      'id'=>2,
      'title'=>'Gratis Konsultasi Gizi',
      'banner'=>asset('assets/img/sample/promo2.jpg'),
      'desc_html'=>'Dapatkan konsultasi gizi gratis untuk setiap pasien rawat jalan tertentu. Kuota terbatas, segera daftar…',
    ],
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <h3 class="mb-0">Promo</h3>
  <a href="{{ route('admin.promos.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah Promo
  </a>
</div>

<div class="card card-soft">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th style="width:32%">Judul Promo</th>
            <th style="width:22%">Banner</th>
            <th>Deskripsi</th>
            <th style="width:120px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($promos as $p)
          <tr>
            <td class="fw-semibold">{{ $p['title'] }}</td>
            <td>
              <img class="thumb" src="{{ $p['banner'] }}" alt="Banner">
            </td>
            <td class="small text-secondary">
              <div class="clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($p['desc_html'] ?? ''), 220) }}</div>
            </td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="{{ route('admin.promos.edit', $p['id']) }}" class="btn btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
                <button type="button" class="btn btn-outline-danger btnDel" title="Hapus"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="text-muted small mt-2">Tip: simpan resolusi banner ± <b>1200×600</b> (rasio 2:1) agar rapi di web.</div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.querySelectorAll('.btnDel').forEach(b=>{
    b.addEventListener('click',()=>{ if(confirm('Hapus promo ini?')) b.closest('tr').remove(); });
  });
</script>
@endpush
