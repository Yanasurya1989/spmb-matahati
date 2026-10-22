@extends('layouts.admin')

@section('title', 'Pengaturan Background')

@section('content')

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Pengaturan Background</h3>
        <p class="text-secondary mb-0">
            Atur gambar latar halaman SPMB SDIT Matahati.
        </p>
    </div>

    <div class="card admin-card">
        <div class="card-body p-4">

            <form action="{{ route('admin.backgrounds.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">
                        Nama Background
                    </label>

                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', $background?->name ?? 'Background SPMB') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Sumber Gambar
                    </label>

                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="source" id="sourceUpload" value="upload"
                                @checked(old('source', $background?->image_url ? 'url' : 'upload') === 'upload')>

                            <label for="sourceUpload" class="form-check-label">
                                Upload dari laptop
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="source" id="sourceUrl" value="url"
                                @checked(old('source', $background?->image_url ? 'url' : 'upload') === 'url')>

                            <label for="sourceUrl" class="form-check-label">
                                URL gambar online
                            </label>
                        </div>
                    </div>
                </div>

                <div id="uploadField" class="mb-3">
                    <label for="image" class="form-label fw-semibold">
                        Pilih Gambar
                    </label>

                    <input type="file" name="image" id="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">

                    <div class="form-text">
                        JPG, PNG, atau WebP. Maksimal 5 MB.
                        Kosongkan jika ingin tetap memakai gambar yang sekarang.
                    </div>
                </div>

                <div id="urlField" class="mb-3">
                    <label for="image_url" class="form-label fw-semibold">
                        URL Gambar
                    </label>

                    <input type="url" name="image_url" id="image_url" class="form-control"
                        value="{{ old('image_url', $background?->image_url) }}"
                        placeholder="https://images.unsplash.com/...">

                    <div class="form-text">
                        Masukkan URL langsung ke gambar, bukan URL halaman pencarian Unsplash.
                    </div>
                </div>

                <div class="mb-4">
                    <label for="overlay_opacity" class="form-label fw-semibold">
                        Transparansi Lapisan Putih
                    </label>

                    <div class="d-flex align-items-center gap-3">
                        <input type="range" class="form-range" min="0" max="100" step="5"
                            name="overlay_opacity" id="overlay_opacity"
                            value="{{ old('overlay_opacity', $background?->overlay_opacity ?? 85) }}">

                        <span id="opacityValue" class="badge text-bg-secondary">
                            {{ old('overlay_opacity', $background?->overlay_opacity ?? 85) }}%
                        </span>
                    </div>

                    <div class="form-text">
                        Nilai tinggi membuat gambar lebih samar.
                        Nilai rendah membuat gambar lebih jelas.
                    </div>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1"
                        @checked(old('is_active', $background?->is_active ?? true))>

                    <label for="is_active" class="form-check-label">
                        Aktifkan background khusus
                    </label>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-teal">
                        Simpan Background
                    </button>

                    <a href="{{ route('public.home') }}" target="_blank" class="btn btn-outline-secondary">
                        Lihat Website
                    </a>
                </div>
            </form>

            @if ($background && ($background->image_path || $background->image_url))
                <hr class="my-4">

                <h5 class="fw-bold mb-3">Background Saat Ini</h5>

                <img src="{{ $background->image_path ? asset('storage/' . $background->image_path) : $background->image_url }}"
                    alt="Background saat ini" class="img-fluid rounded-3 border"
                    style="width:100%; max-height:300px; object-fit:cover;">
            @endif

        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadRadio = document.getElementById('sourceUpload');
            const urlRadio = document.getElementById('sourceUrl');
            const uploadField = document.getElementById('uploadField');
            const urlField = document.getElementById('urlField');
            const imageInput = document.getElementById('image');
            const urlInput = document.getElementById('image_url');

            const opacityInput = document.getElementById('overlay_opacity');
            const opacityValue = document.getElementById('opacityValue');

            function updateSource() {
                const isUpload = uploadRadio.checked;

                uploadField.style.display = isUpload ? 'block' : 'none';
                urlField.style.display = isUpload ? 'none' : 'block';

                urlInput.required = !isUpload;
            }

            uploadRadio.addEventListener('change', updateSource);
            urlRadio.addEventListener('change', updateSource);

            opacityInput.addEventListener('input', function() {
                opacityValue.textContent = this.value + '%';
            });

            updateSource();
        });
    </script>
@endpush
