@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit Lowongan' : 'Tambah Lowongan')

@push('head')
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .help{font-size:.85rem;color:#6b7280}
  .req-item{display:flex;gap:.5rem;margin-bottom:.5rem}
  .req-item input{flex:1}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';

  // ===== defaults supaya tidak ada "Undefined array key" =====
  $x = array_merge([
    'title'=>'','dept'=>'','location'=>'','type'=>'Full-time','salary'=>'',
    'deadline'=>now()->addDays(14)->format('Y-m-d'),
    'apply_url'=>'','apply_email'=>'','order'=>1,'status'=>'draft',
    'slug'=>'','meta_title'=>'','meta_desc'=>'',
    'desc_html'=>'','req_html'=>''
  ], $job ?? []);

  $types = $types ?? ['Full-time','Part-time','Kontrak','Magang'];
  $depts = $depts ?? ['Medical','Keperawatan','Farmasi','Laboratorium','Operasional','IT','Keuangan'];

  // Pre-fill persyaratan (list) dari req_html <li>...</li>
  $reqItems = [];
  if (!empty($x['req_html']) && preg_match_all('/<li[^>]*>(.*?)<\/li>/si', $x['req_html'], $m)) {
      $reqItems = array_map(fn($s)=>trim(strip_tags($s)), $m[1]);
  }
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit Lowongan' : 'Tambah Lowongan' }}</h3>
  <a href="{{ route('admin.carier.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" onsubmit="return collectEditors()">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="mb-3">
          <label class="form-label">Posisi</label>
          <input name="title" class="form-control" value="{{ $x['title'] }}" required>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Departemen</label>
            <input name="dept" class="form-control" list="deptList" value="{{ $x['dept'] }}" placeholder="mis. Keperawatan" required>
            <datalist id="deptList">@foreach($depts as $d)<option value="{{ $d }}"></option>@endforeach</datalist>
          </div>
        </div>

        <div class="row g-3 mt-1">
          <div class="col-md-4">
            <label class="form-label">Deadline Lamaran</label>
            <input type="date" name="deadline" class="form-control" value="{{ $x['deadline'] }}">
          </div>
        </div>

        <div class="row g-3 mt-1">
          <div class="col-md-6">
            <label class="form-label">Apply URL</label>
            <input name="apply_url" class="form-control" value="{{ $x['apply_url'] }}" placeholder="https://forms/lamar">
          </div>
          <div class="col-md-6">
            <label class="form-label">Apply Email</label>
            <input type="email" name="apply_email" class="form-control" value="{{ $x['apply_email'] }}" placeholder="hrd@rs.co.id">
          </div>
        </div>

        {{-- Deskripsi pekerjaan (rich text) --}}
        <div class="mt-3">
          <div class="d-flex justify-content-between align-items-center">
            <label class="form-label mb-2">Deskripsi Pekerjaan</label>
            <small class="text-muted">Rich text (list, link, gambar).</small>
          </div>
          <div id="editorDesc" style="height:220px;background:#fff;"></div>
          <input type="hidden" name="desc_html" id="descHidden">
        </div>

        {{-- Kualifikasi (rich text) --}}
        <div class="mt-3">
          <div class="d-flex justify-content-between align-items-center">
            <label class="form-label mb-2">Kualifikasi</label>
            <small class="text-muted">Bisa tulis bebas atau gunakan daftar Persyaratan di bawah.</small>
          </div>
          <div id="editorReq" style="height:200px;background:#fff;"></div>
          <input type="hidden" name="req_html" id="reqHidden">
        </div>

        {{-- Persyaratan (list poin) – baru --}}
        <div class="mt-3">
          <label class="form-label mb-1">Persyaratan (List Poin)</label>
          <div class="help mb-2">Tambah baris persyaratan satu per satu. Bila bagian "Kualifikasi" kosong, daftar ini otomatis dibuat menjadi bullet list.</div>
          <div id="reqList">
            @forelse($reqItems as $it)
              <div class="req-item">
                <input type="text" class="form-control" name="req_items[]" value="{{ $it }}" placeholder="Contoh: STR aktif">
                <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="bi bi-x"></i></button>
              </div>
            @empty
              <div class="req-item">
                <input type="text" class="form-control" name="req_items[]" placeholder="Contoh: STR aktif">
                <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="bi bi-x"></i></button>
              </div>
            @endforelse
          </div>
          <button type="button" class="btn btn-sm btn-outline-primary mt-1" id="addReq">
            <i class="bi bi-plus-lg me-1"></i>Tambah Persyaratan
          </button>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft"   @selected($x['status']==='draft')>Draft</option>
              <option value="publish" @selected($x['status']==='publish')>Publish</option>
              <option value="closed"  @selected($x['status']==='closed')>Closed</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Urutan Tampil</label>
            <input type="number" name="order" class="form-control" min="1" value="{{ $x['order'] }}">
          </div>
        </div>

        <div class="mt-3">
          <label class="form-label">Slug (opsional)</label>
          <input name="slug" class="form-control" value="{{ $x['slug'] }}" placeholder="otomatis dari posisi jika kosong">
        </div>
        <div class="mt-3">
          <label class="form-label">Meta Title (opsional)</label>
          <input name="meta_title" class="form-control" value="{{ $x['meta_title'] }}">
        </div>
        <div class="mt-2">
          <label class="form-label">Meta Description (opsional)</label>
          <textarea name="meta_desc" class="form-control" rows="3">{{ $x['meta_desc'] }}</textarea>
        </div>
      </div>
    </div>
  </div>

  <div class="card-footer d-flex justify-content-end gap-2">
    <a href="{{ route('admin.carier.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-outline-primary" type="button" onclick="document.querySelector('[name=status]').value='draft'">Simpan Draft</button>
    <button class="btn btn-primary">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
  // toolbar ringkas
  const toolbar = [
    [{ header: [false, 3, 4, 5] }],
    ['bold','italic','underline'],
    [{'list':'ordered'},{'list':'bullet'}],
    ['link'], [{ 'align': [] }], ['clean']
  ];
  const qDesc = new Quill('#editorDesc', { theme:'snow', modules:{ toolbar }, placeholder:'Tulis deskripsi pekerjaan…' });
  const qReq  = new Quill('#editorReq',  { theme:'snow', modules:{ toolbar }, placeholder:'Tulis kualifikasi…' });

  // paste konten awal (HTML) ke Quill dengan aman (tanpa tampil <p>)
  qDesc.clipboard.dangerouslyPasteHTML(@json($x['desc_html'] ?? ''));
  qReq.clipboard.dangerouslyPasteHTML(@json($x['req_html'] ?? ''));

  // tambah/hapus baris persyaratan
  document.getElementById('addReq').addEventListener('click', () => {
    const row = document.createElement('div');
    row.className = 'req-item';
    row.innerHTML = `
      <input type="text" class="form-control" name="req_items[]" placeholder="Contoh: STR aktif">
      <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="bi bi-x"></i></button>`;
    document.getElementById('reqList').appendChild(row);
  });

  // escape teks user saat dijadikan HTML list
  function escHtml(s){return s.replace(/[&<>"']/g, m=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' }[m]));}

  // kumpulkan isi editor + daftar persyaratan saat submit
  function collectEditors(){
    document.getElementById('descHidden').value = qDesc.root.innerHTML.trim();

    // jika editor kualifikasi kosong, generate dari list req_items[]
    const items = [...document.querySelectorAll('input[name="req_items[]"]')]
      .map(i=>i.value.trim()).filter(Boolean);
    if(qReq.getText().trim().length === 0 && items.length){
      const ul = '<ul>' + items.map(t=>`<li>${escHtml(t)}</li>`).join('') + '</ul>';
      document.getElementById('reqHidden').value = ul;
    }else{
      document.getElementById('reqHidden').value = qReq.root.innerHTML.trim();
    }
    return true; // lanjut submit
  }
</script>
@endpush
