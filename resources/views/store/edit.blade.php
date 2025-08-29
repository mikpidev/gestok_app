@extends('layouts.admin')

@section('content')
<!--     formulario para la creacion de un companias -->
    <form action="{{ route('stores.update', $stores->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('store._form')
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