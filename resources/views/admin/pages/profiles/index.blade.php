@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('profiles.index') }}" class="active">Perfis</a>
    </li>
</ol>
<h1>Perfis</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline d-flex justify-content-between">
            @csrf
            <div>
                <a href="{{ route('profiles.create') }}" class="btn btn-dark pt-2"><i class="fas fa-plus-square fa-lg"></i></a>
            </div>
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
                    <td>Nome</td>
                    <td width="200">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                <tr class="text-center">
                    <td>{{ $profile->name }}</td>
                    <td>
                        <div class="d-inline justify-content-center">
                            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="form form-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-dark btn-sm mr-2"><i class="fas fa-lock fa-md"></i></i></a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-success btn-sm mr-2"><i class="far fa-eye fa-md"></i></a>
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit fa-md"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-md"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $profiles->appends($filters)->links() !!}
        @else
        {!! $profiles->links() !!}
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