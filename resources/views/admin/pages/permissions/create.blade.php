@extends('adminlte::page')

@section('title', 'Cadastrar Permissão')

@section('content_header')
    <h1>Cadastrar Permissão </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.permissions._partials.form')
                <button type="submit" class="btn btn-dark">Adicionar Permissão</button>
            </form>
        </div>
    </div>
@endsection