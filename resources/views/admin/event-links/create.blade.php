@extends('layouts.admin')

@section('title', 'Tambah Tautan')

@section('content')

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Tambah Tautan</h3>
        <p class="text-secondary mb-0">
            Tambahkan tombol baru untuk halaman SPMB.
        </p>
    </div>

    <div class="card admin-card">
        <div class="card-body p-4">
            <form action="{{ route('admin.event-links.store') }}" method="POST">
                @csrf

                @include('admin.event-links._form')
            </form>
        </div>
    </div>

@endsection
