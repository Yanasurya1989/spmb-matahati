@extends('layouts.admin')

@section('title', 'Kelola Tautan')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Tautan</h3>
            <p class="text-secondary mb-0">
                SPMB SDIT Matahati Tahun Ajaran 2026/2027
            </p>
        </div>

        <a href="{{ route('admin.event-links.create') }}" class="btn btn-teal">
            + Tambah Tautan
        </a>
    </div>

    <div class="card admin-card">
        <div class="card-body">

            <form action="{{ route('admin.event-links.bulk-destroy') }}" method="POST" id="bulkForm">

                @csrf
                @method('DELETE')

                <div class="d-flex flex-wrap justify-content-between gap-2 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkAll">

                        <label class="form-check-label" for="checkAll">
                            Pilih semua di halaman ini
                        </label>
                    </div>

                    <button type="submit" class="btn btn-danger btn-sm" id="deleteSelected">
                        Hapus yang Dipilih
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th>Urutan</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>URL</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($links as $link)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input row-check" name="ids[]"
                                            value="{{ $link->id }}">
                                    </td>

                                    <td>{{ $link->sort_order }}</td>

                                    <td>
                                        <span class="me-1">{{ $link->icon }}</span>
                                        <strong>{{ $link->title }}</strong>

                                        @if ($link->show_download)
                                            <div class="small text-secondary">
                                                Simbol unduh aktif
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        {{ strtoupper($link->type) }}
                                    </td>

                                    <td>
                                        @if ($link->is_active)
                                            <span class="badge text-bg-success">Aktif</span>
                                        @else
                                            <span class="badge text-bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer">
                                            Buka tautan
                                        </a>
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.event-links.edit', $link) }}"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="deleteOne('{{ route('admin.event-links.destroy', $link) }}')">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-secondary py-5">
                                        Belum ada tautan.
                                        Klik Tambah Tautan untuk memulai.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="mt-3">
                {{ $links->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

    <form id="singleDeleteForm" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>

@endsection

@push('scripts')
    <script>
        const checkAll = document.getElementById('checkAll');
        const rowChecks = document.querySelectorAll('.row-check');
        const bulkForm = document.getElementById('bulkForm');

        checkAll.addEventListener('change', function() {
            rowChecks.forEach(function(checkbox) {
                checkbox.checked = checkAll.checked;
            });
        });

        bulkForm.addEventListener('submit', function(event) {
            const selected = document.querySelectorAll(
                '.row-check:checked'
            );

            if (selected.length === 0) {
                event.preventDefault();
                alert('Pilih minimal satu tautan.');
                return;
            }

            if (!confirm('Yakin ingin menghapus ' + selected.length + ' tautan terpilih?')) {
                event.preventDefault();
            }
        });

        function deleteOne(url) {
            if (confirm('Yakin ingin menghapus tautan ini?')) {
                const form = document.getElementById('singleDeleteForm');
                form.action = url;
                form.submit();
            }
        }
    </script>
@endpush
