@extends('layouts.admin')

@section('content')


<!--Mostrar compania-->
    <h1>Detalles de la Compañía</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $company->company_name }}</h5>
            <p class="card-text"><strong>Dirección:</strong> {{ $company->address }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $company->phone }}</p>
            <p class="card-text"><strong>Dueño:</strong> {{ $company->owner }}</p>
            <p class="card-text"><strong>Correo Electrónico:</strong> {{ $company->email }}</p>
            <p class="card-text"><strong>Sitio Web:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            <p class="card-text"><strong>Plan:</strong> {{ ucfirst($company->plan) }}</p>
            <p class="card-text"><strong>Tipo de Despliegue:</strong> {{ ucfirst(str_replace('_', ' ', $company->deployment_type)) }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ ucfirst($company->status) }}</p>
            <p class="card-text"><strong>Comentarios:</strong> {{ $company->comments }}</p>
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Editar</a>

            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta compañía?')">Eliminar</button>
            </form>

        </div>



@endsection