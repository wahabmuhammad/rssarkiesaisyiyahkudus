@extends('components.layouts.admin')
@section('title','FAQ')

@push('head')
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .chip{background:#f1f5f9;border:1px solid #e5e7eb;border-radius:999px;padding:.2rem .55rem}
</style>
@endpush

@section('content')
@php
  // DEMO DATA (nanti dari DB)
  $faqs = $faqs ?? [
    ['id'=>1,'category'=>'Pendaftaran','question'=>'Bagaimana cara mendaftar berobat?','answer'=>'Anda dapat mendaftar via loket/WA resmi.'],
    ['id'=>2,'category'=>'Asuransi','question'=>'Apakah menerima BPJS?','answer'=>'Ya, RS kami menerima BPJS Kesehatan.'],
    ['id'=>3,'category'=>'Kunjungan','question'=>'Jam besuk pasien?','answer'=>'Pukul 11.00–13.00 dan 17.00–19.00 WIB.'],
  ];
  $categories = collect($faqs)->pluck('category')->unique()->values();
@endphp

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
  <div>
    <h3 class="mb-0">FAQ</h3>
    <div class="text-muted">Kelola pertanyaan umum pasien.</div>
  </div>
  <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-circle me-1"></i> Tambah FAQ
  </a>
</div>

<div class="card card-soft mb-3">
  <div class="card-body">
    <form class="row g-2">
      <div class="col-md-6">
        <input type="search" class="form-control" placeholder="Cari pertanyaan…">
      </div>
      <div class="col-md-3">
        <select class="form-select">
          <option value="">Semua Kategori</option>
          @foreach($categories as $c) <option>{{ $c }}</option> @endforeach
        </select>
      </div>
      <div class="col-md-3">
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
            <th style="width:220px">Kategori</th>
            <th>Pertanyaan</th>
            <th style="width:120px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($faqs as $f)
          <tr>
            <td><span class="chip">{{ $f['category'] }}</span></td>
            <td>
              <div class="fw-semibold">{{ $f['question'] }}</div>
              <div class="text-muted small">{{ Str::limit(strip_tags($f['answer']), 120) }}</div>
            </td>
            <td>
              <div class="btn-group btn-group-sm">
                <a class="btn btn-outline-primary" href="{{ route('admin.faq.edit',$f['id']) }}"><i class="bi bi-pencil"></i></a>
                <button class="btn btn-outline-danger" onclick="if(confirm('Hapus item ini?')) this.closest('tr').remove();"><i class="bi bi-trash"></i></button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
