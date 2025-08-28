@extends('layouts.admin')

@section('content')
<h1>Usuarios y Roles</h1>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Permisos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                <td>{{ implode(', ', $user->getAllPermissions()->pluck('name')->toArray()) }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Editar Roles</a>
                    <a href="#" class="btn btn-sm btn-danger">Revocar Roles</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection