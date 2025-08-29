@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Compañías</h2>

            <!-- Botón para crear una nueva compañía -->
        <a href="{{ route('companies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Compañía
        </a>
    </div>

    @forelse($companies as $company)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $company->company_name }}</h5>
                    <p class="card-text"><strong>Dirección:</strong> {{ $company->address }}</p>
                    <p class="card-text"><strong>Teléfono:</strong> {{ $company->phone }}</p>
                    <p class="card-text"><strong>Dueño:</strong> {{ $company->owner }}</p>
                    <p class="card-text"><strong>Correo Electrónico:</strong> {{ $company   ->email }}</p>
                    <p class="card-text"><strong>Sitio Web:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
                    <p class="card-text"><strong>Plan:</strong> {{ ucfirst($company->plan) }}</p>
                    <p class="card-text"><strong>Tipo de Despliegue:</strong> {{ ucfirst($company->deployment_type) }}</p>
                    <p class="card-text"><strong>Estado:</strong> {{ ucfirst($company->status) }}</p>
                    <p class="card-text"><strong>Comentarios:</strong> {{ $company->comments }}</p>
                    
                    <a href="{{ route('companies.show', $company) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i> Ver
                    </a>
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta compañía?')">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p>No hay compañías registradas.</p>    
        @endforelse
@endsection