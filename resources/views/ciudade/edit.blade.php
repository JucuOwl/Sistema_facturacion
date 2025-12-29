@extends('adminlte::page')

@section('title', 'Editar Ciudad')

@section('content_header')
    <h1>Editar Ciudad</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('ciudades.update', $ciudad->codigo_ciudad) }}" method="POST">
            @csrf
            @method('PUT')
            @include('ciudad.form')
        </form>
    </div>
</div>
@endsection
