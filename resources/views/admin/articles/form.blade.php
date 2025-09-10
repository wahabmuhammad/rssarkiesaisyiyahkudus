@extends('components.layouts.admin')
@section('title', ($mode??'create')==='edit' ? 'Edit Artikel' : 'Tulis Artikel')

@push('head')
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<style>
  .card-soft{border:0;border-radius:18px;box-shadow:0 8px 24px rgba(20,44,90,.06);background:#fff;}
  .cover-preview{width:100%;max-height:220px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb}
  .token{display:inline-flex;align-items:center;gap:6px;padding:.2rem .5rem;border-radius:999px;border:1px solid #e5e7eb;background:#f8fafc;margin:.15rem}
  .token .rm{cursor:pointer}
  .help{font-size:.85rem;color:#6b7280}
  .badge-status{border-radius:999px;padding:.25rem .55rem;font-weight:600}
</style>
@endpush

@section('content')
@php
  $mode = $mode ?? 'create';
  $a = $article ?? [
    'title'=>'','slug'=>'','category'=>'Kesehatan','tags'=>[],
    'author'=>'','publish_at'=>now()->format('Y-m-d\TH:i'),
    'excerpt'=>'','cover'=>'','content'=>'',
    'auto_related'=>true,'related'=>[],
    'pinned'=>false,'featured'=>false,'show_on_home'=>true,
    'status'=>'draft'
  ];
  $categories = ['Kesehatan','Pengumuman','Kegiatan'];
  $allArticles = [
    ['id'=>2,'title'=>'Tips Kesehatan Anak'],['id'=>3,'title'=>'Cegah ISPA'],['id'=>4,'title'=>'Promo Vaksin']
  ];
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">{{ $mode==='edit' ? 'Edit Artikel' : 'Tulis Artikel' }}</h3>
  <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<form class="card card-soft" method="POST" action="#" onsubmit="return collectContent()">
  @csrf
  <div class="card-body">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="mb-3">
          <label class="form-label">Judul</label>
          <input name="title" id="title" value="{{ $a['title'] }}" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Slug (opsional)</label>
          <input name="slug" id="slug" value="{{ $a['slug'] }}" class="form-control" placeholder="otomatis dari judul jika kosong">
        </div>
        <div class="mb-3">
          <label class="form-label">Excerpt (ringkasan)</label>
          <textarea name="excerpt" class="form-control" rows="3" placeholder="Ringkasan singkat…">{{ $a['excerpt'] }}</textarea>
        </div>

        <div class="mb-2 d-flex justify-content-between align-items-center">
          <label class="form-label mb-0">Isi (Rich Text)</label>
          <small class="help">Gunakan toolbar untuk heading, daftar, gambar, link, embed.</small>
        </div>
        <div id="editor" style="height: 340px; background:#fff;">{!! $a['content'] !!}</div>
        <input type="hidden" name="content" id="contentHtml">
      </div>

      <div class="col-lg-4">
        <div class="mb-3">
          <label class="form-label">Kategori</label>
          <select name="category" class="form-select">
            @foreach($categories as $c)
              <option value="{{ $c }}" @selected($a['category']===$c)>{{ $c }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Tag</label>
          <div id="tagWrap">
            @foreach($a['tags'] as $t)
              <span class="token">{{ $t }} <span class="rm">×</span></span>
            @endforeach
          </div>
          <input type="text" id="tagInput" class="form-control mt-2" placeholder="Ketik lalu Enter">
          <input type="hidden" name="tags" id="tagsHidden" value="{{ implode(',', $a['tags']) }}">
        </div>

        <div class="mb-3">
          <label class="form-label">Penulis</label>
          <input name="author" value="{{ $a['author'] }}" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Tanggal Publish / Schedule</label>
          <input type="datetime-local" name="publish_at" value="{{ $a['publish_at'] }}" class="form-control">
          <div class="help">Jika status “Scheduled”, artikel akan tayang pada waktu ini.</div>
        </div>

        <div class="mb-3">
          <label class="form-label">Cover</label>
          <input type="file" accept="image/*" class="form-control" id="coverInp">
          <img id="coverPrev" src="{{ $a['cover'] }}" class="cover-preview mt-2" onerror="this.style.display='none'">
        </div>

        <div class="mb-3">
          <label class="form-label">Related Content</label>
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="autoRelated" {{ $a['auto_related'] ? 'checked' : '' }}>
            <label class="form-check-label" for="autoRelated">Otomatis (berdasarkan kategori/tag)</label>
          </div>
          <div id="manualRelated" class="{{ $a['auto_related'] ? 'd-none':'' }}">
            <select id="relatedSelect" class="form-select" multiple size="4">
              @foreach($allArticles as $x)
                <option value="{{ $x['id'] }}" @selected(in_array($x['id'],$a['related']))>{{ $x['title'] }}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" name="related_ids" id="relatedHidden" value="{{ implode(',', $a['related']) }}">
        </div>

        <div class="row g-2">
          <div class="col-12">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="draft" @selected($a['status']==='draft')>Draft</option>
              <option value="scheduled" @selected($a['status']==='scheduled')>Scheduled</option>
              <option value="published" @selected($a['status']==='published')>Published</option>
            </select>
          </div>
          <div class="col-12">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="show_on_home" id="showHome" {{ $a['show_on_home']?'checked':'' }}>
              <label class="form-check-label" for="showHome">Tampilkan di Beranda</label>
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="featured" id="featured" {{ $a['featured']?'checked':'' }}>
              <label class="form-check-label" for="featured">Featured</label>
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="pinned" id="pinned" {{ $a['pinned']?'checked':'' }}>
              <label class="form-check-label" for="pinned">Pinned</label>
            </div>
          </div>
        </div>

      </div>{{-- col-right --}}
    </div>
  </div>

  <div class="card-footer d-flex gap-2 justify-content-end">
    <a href="{{ route('admin.articles.index') }}" class="btn btn-light">Batal</a>
    <button class="btn btn-outline-primary" type="button" onclick="setStatus('draft')">Simpan Draft</button>
    <button class="btn btn-primary" type="submit">Simpan</button>
  </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
  // QUILL
  const quill = new Quill('#editor', { theme: 'snow', placeholder: 'Tulis konten di sini…' });
  function collectContent(){
    document.getElementById('contentHtml').value = quill.root.innerHTML;
    // related manual
    const rel = [...(document.getElementById('relatedSelect')||{options:[]}).selectedOptions].map(o=>o.value);
    document.getElementById('relatedHidden').value = rel.join(',');
    // tags
    document.getElementById('tagsHidden').value = [...document.querySelectorAll('#tagWrap .token')].map(t=>t.childNodes[0].textContent.trim()).join(',');
    return true; // submit
  }
  function setStatus(v){ document.querySelector('select[name="status"]').value=v; }

  // Cover preview
  document.getElementById('coverInp').addEventListener('change', e=>{
    const file = e.target.files?.[0]; if(!file) return;
    const url = URL.createObjectURL(file);
    const img = document.getElementById('coverPrev'); img.src = url; img.style.display='block';
  });

  // Tags simple token
  const tagInp = document.getElementById('tagInput');
  const tagWrap = document.getElementById('tagWrap');
  tagInp.addEventListener('keydown', e=>{
    if(e.key==='Enter' && tagInp.value.trim()){
      e.preventDefault();
      const span=document.createElement('span'); span.className='token';
      span.innerHTML = tagInp.value.trim()+' <span class="rm">×</span>';
      tagWrap.appendChild(span); tagInp.value='';
    }
  });
  tagWrap.addEventListener('click', e=>{ if(e.target.classList.contains('rm')) e.target.parentElement.remove(); });

  // Related toggle
  const autoRel = document.getElementById('autoRelated');
  function syncRelated(){ document.getElementById('manualRelated').classList.toggle('d-none', autoRel.checked); }
  autoRel.addEventListener('change', syncRelated); syncRelated();
</script>
@endpush
