@extends('layouts.admin')

@section('content')


<!--Mostrar compania-->
    <h1>Detalles de la Tienda</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $store->store_name }}</h5>
            <p class="card-text"><strong>Compañía:</strong> {{ $store->company->name ?? 'N/A' }}</p>
            <p class="card-text"><strong>Dirección:</strong> {{ $store->address }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $store->phone }}</p>
            <p class="card-text"><strong>Gerente:</strong> {{ $store->manager }}</p>
            <p class="card-text"><strong>Correo Electrónico:</strong> {{ $store->email }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ ucfirst($store->status) }}</p>
            <p class="card-text"><strong>Comentarios:</strong> {{ $store->comments }}</p>
            <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('stores.index') }}" class="btn btn-secondary">Volver a la Lista</a>

            <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tienda?')">Eliminar</button>
            </form>


        </div>



@endsection