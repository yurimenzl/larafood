@extends('adminlte::page')

@section('title', 'Detalhes da Permissão {$permission->name}')

@section('content_header')
    <h1>Detalhes da permissão <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{ $permission->name }}
                </li>
                <li>
                    <strong>Descrição: </strong>{{ $permission->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR A PERMISSÃO {{ $permission->name }}</button>
            </form>
        </div>
    </div>
@endsection