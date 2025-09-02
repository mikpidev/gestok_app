@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="card-title">Usuarios</h2>

        <a href="{{ route('stores.users.create', $store->id) }}" class="btn btn-add">
        <i class="bi bi-plus-circle"></i> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
        </svg>
    </a>

@endsection