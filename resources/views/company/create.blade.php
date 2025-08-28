@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Crear Compañías</h2>
        <a href="{{ route('companies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Compañía
        </a>
    </div>

    <!--     formulario para la creacion de un companias -->
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        @include('company._form')
    </form>
    
    @if ($errors->any())
        <div class="alert alert-danger">    
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>       
        </div>
    @endif
    
    
@endsection