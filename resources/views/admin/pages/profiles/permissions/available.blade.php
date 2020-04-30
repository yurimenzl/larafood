@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('profiles.index') }}" class="active">Perfis</a>
    </li>
</ol>
<h1>Permissões Disponíveis</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('profiles.permissions.available', $profile->id) }}" method="POST" class="form form-inline d-flex justify-content-between">
            @csrf
            <div>
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark pt-2"><i class="fas fa-search fa-lg"></i></button>
            </div>

        </form>
    </div>
    <div class="card-body">

        @include('admin.includes.alerts')

        <table class="table table-condensed table-bordered table-hover">
            <thead>
                <tr class="bg-dark text-center">
                    <th width="50px">#</th>
                    <th>Nome</td>
                    {{-- <td width="200">Ações</td> --}}
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                    @csrf
                    @foreach ($permissions as $permission)
                        <tr class="text-center">
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            </td>
                            <td>{{ $permission->name }}</td>
                            {{-- <td>
                                <div class="d-inline justify-content-center">
                                    <form action="{{ route('profiles.destroy', $permission->id) }}" method="POST" class="form form-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('profiles.edit', $permission->id) }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit fa-md"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-md"></i></button>
                                    </form>
                                </div>

                            </td> --}}
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $permissions->appends($filters)->links() !!}
        @else
        {!! $permissions->links() !!}
        @endif

    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop