@php
    $item = $eventLink ?? null;
@endphp

<div class="mb-3">
    <label for="title" class="form-label">Nama Tautan</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item?->title) }}"
        placeholder="Contoh: Link Pendaftaran" required>
</div>

<div class="mb-3">
    <label for="url" class="form-label">URL Tujuan</label>
    <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $item?->url) }}"
        placeholder="https://..." required>
    <div class="form-text">
        Masukkan link Google Forms, website, atau PDF yang dapat diakses.
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="icon" class="form-label">Ikon / Emoji</label>
        <input type="text" name="icon" id="icon" class="form-control"
            value="{{ old('icon', $item?->icon ?? '🔗') }}" maxlength="30" required>
        <div class="form-text">
            Contoh: 🔗, 📄, 📝, 📚
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label for="type" class="form-label">Jenis Tautan</label>
        <select name="type" id="type" class="form-select" required>
            <option value="link" @selected(old('type', $item?->type ?? 'link') === 'link')>
                Link biasa
            </option>
            <option value="pdf" @selected(old('type', $item?->type ?? 'link') === 'pdf')>
                Dokumen / PDF
            </option>
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="sort_order" class="form-label">Urutan Tampil</label>
    <input type="number" name="sort_order" id="sort_order" class="form-control" min="0"
        value="{{ old('sort_order', $item?->sort_order ?? 0) }}" required>
    <div class="form-text">
        Angka lebih kecil akan tampil lebih dahulu.
    </div>
</div>

<div class="form-check mb-3">
    <input type="checkbox" class="form-check-input" name="show_download" value="1" id="show_download"
        @checked(old('show_download', $item?->show_download ?? false))>

    <label for="show_download" class="form-check-label">
        Tampilkan ikon unduh
    </label>
</div>

<div class="form-check mb-4">
    <input type="checkbox" class="form-check-input" name="is_active" value="1" id="is_active"
        @checked(old('is_active', $item?->is_active ?? true))>

    <label for="is_active" class="form-check-label">
        Aktifkan tautan di halaman publik
    </label>
</div>

<div class="d-flex flex-wrap gap-2">
    <button type="submit" class="btn btn-teal">
        {{ $item ? 'Simpan Perubahan' : 'Simpan Tautan' }}
    </button>

    <a href="{{ route('admin.event-links.index') }}" class="btn btn-outline-secondary">
        Batal
    </a>
</div>
