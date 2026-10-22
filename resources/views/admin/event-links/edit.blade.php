@extends('layouts.admin')

@section('title', 'Edit Tautan')

@section('content')

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Tautan</h3>
        <p class="text-secondary mb-0">
            Ubah informasi tautan yang sudah tersimpan.
        </p>
    </div>

    <div class="card admin-card">
        <div class="card-body p-4">
            <form action="{{ route('admin.event-links.update', $eventLink) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.event-links._form', [
                    'eventLink' => $eventLink,
                ])
            </form>
        </div>
    </div>

@endsection
