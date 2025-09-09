@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit FAQ' : 'Tambah FAQ')

@push('head')
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  $f = $faq ?? ['category'=>'','question'=>'','answer'=>''];
  // contoh saran kategori
  $suggest = ['Pendaftaran','Asuransi','Kunjungan','Rawat Jalan','Rawat Inap','Telemed'];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit FAQ' : 'Tambah FAQ' }}</h3>
  <a href="{{ route('admin.faq.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" onsubmit="return collectAnswer()">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-6">
        <label class="form-label">Kategori</label>
        <input name="category" id="catInp" class="form-control" value="{{ $f['category'] }}" list="catList" required>
        <datalist id="catList">
          @foreach($suggest as $c) <option value="{{ $c }}"></option> @endforeach
        </datalist>
      </div>
      <div class="col-lg-12">
        <label class="form-label mt-2">Pertanyaan</label>
        <input name="question" class="form-control" value="{{ $f['question'] }}" required>
      </div>

      <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center">
          <label class="form-label mb-2">Jawaban</label>
          <small class="text-muted">Rich text diperbolehkan (link, daftar, dll).</small>
        </div>
        <div id="editor" style="height: 260px; background:#fff;">{!! $f['answer'] !!}</div>
        <input type="hidden" name="answer" id="answerHtml">
      </div>
    </div>
  </div>

  <div class="card-footer d-flex justify-content-end gap-2">
    <a href="{{ route('admin.faq.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
  const quill = new Quill('#editor', { theme: 'snow', placeholder: 'Tulis jawaban…' });
  function collectAnswer(){
    document.getElementById('answerHtml').value = quill.root.innerHTML;
    return true;
  }
</script>
@endpush
