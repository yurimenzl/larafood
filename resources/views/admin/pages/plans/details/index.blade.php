@extends('adminlte::page')

@section('title', 'Detalhes do plano {$plan->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('plans.index') }}">Planos</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a>
        </li>
    </ol>
    <h1>Detalhes do plano {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <div>
                    <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark pt-2"><i class="fas fa-plus-square fa-lg"></i></a>
                </div>
        </div>
        <div class="card-body">
            <p>@include('admin.includes.alerts')</p>

            <table class="table table-condensed table-bordered table-hover">
                <thead>
                    <tr class="bg-dark text-center">
                        <td>Nome</td>
                        <td width="150">Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                    <tr class="text-center">
                        <td>{{ $detail->name }}</td>
                        <td>
                            <div class="d-inline justify-content-center">
                                <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST" class="form form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-success btn-sm mr-2"><i class="far fa-eye fa-md"></i></a>
                                    <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit fa-md"></i></a>
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
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}    
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