@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('plans.index') }}" class="active">Planos</a>
        </li>
    </ol>
    <h1>Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline d-flex justify-content-between">
                @csrf
                <div>
                    <a href="{{ route('plans.create') }}" class="btn btn-dark pt-2"><i class="fas fa-plus-square fa-lg"></i></a>
                </div>
                <div>
                    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
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
                        <td>Preço</td>
                        <td width="200">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr class="text-center">
                        <td>{{ $plan->name }}</td>
                        <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                        <td>
                            <div class="d-inline">
                                <form action="{{ route('plans.destroy', $plan->url) }}" method="POST" class="form form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-info-circle fa-md"></i></i></a>
                                    <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-success btn-sm mr-2"><i class="far fa-eye fa-md"></i></a>
                                    <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit fa-md"></i></a>
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
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}    
            @endif
            
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop