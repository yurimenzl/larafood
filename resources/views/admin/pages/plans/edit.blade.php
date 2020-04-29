@extends('adminlte::page')

@section('title', 'Editar Plano {$plan->name}')

@section('content_header')
    <h1>Editar {{  $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.plans._partials.form')
                <button type="submit" class="btn btn-dark">Editar Plano</button>
            </form>
        </div>
    </div>
@endsection