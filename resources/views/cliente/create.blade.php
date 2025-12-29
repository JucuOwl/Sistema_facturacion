@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
    <h1>Registrar Cliente</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            @include('cliente.form')
        </form>
    </div>
</div>
@endsection
