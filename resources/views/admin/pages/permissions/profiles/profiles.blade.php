@extends('adminlte::page')

@section('title', "Perfis da permissão {$permission->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('permissions.index') }}" class="active">Permissões</a>
    </li>
</ol>
<h1>Perfis</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        @include('admin.includes.alerts')

        <table class="table table-condensed table-bordered table-hover">
            <thead>
                <tr class="bg-dark text-center">
                    <td>Nome</td>
                    {{-- <td width="200">Ações</td> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                <tr class="text-center">
                    <td>{{ $profile->name }}</td>
                    {{-- <td>
                        <div class="d-inline justify-content-center">
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger btn-sm mr-2"><i class="fas fa-trash fa-md"></i></a>
                            </form>
                        </div>
                    </td> --}}
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