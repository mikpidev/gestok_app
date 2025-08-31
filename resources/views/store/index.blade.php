@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tiendas</h2> 
    </div>

    @forelse($stores as $stores)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $stores->store_name }}</h5>
                    <p class="card-text"><strong>Dirección:</strong> {{ $stores->address }}</p>
                    <p class="card-text"><strong>Teléfono:</strong> {{ $stores->phone }}</p>
                    <p class="card-text"><strong>Gerente:</strong> {{ $stores->manager }}</p>
                    <p class="card-text"><strong>Correo Electrónico:</strong> {{ $stores    ->email }}</p>
                    <p class="card-text"><strong>Estado:</strong> {{ ucfirst($stores->status) }}</p>
                    <p class="card-text"><strong>Comentarios:</strong> {{ $stores->comments }}</p>
                    <a href="{{ route('stores.show', $stores->id) }}" class="btn btn-info">Ver Detalles</a>
                    <a href="{{ route('stores.edit', $stores->id) }}" class="btn btn-warning">Editar</a>

                    <form action="{{ route('stores.destroy', $stores->id) }}" method="POST          " class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tienda?')">Eliminar</button>
                    </form>
                    
                </div>
            </div>
        @empty
            <p>No hay compañías registradas.</p>    
        @endforelse

@endsection