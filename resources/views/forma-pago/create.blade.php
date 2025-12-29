@extends('layouts.app')

@section('template_title')
    Crear Forma de Pago
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Crear Forma de Pago</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('forma-pagos.store') }}">
                        @csrf
                        @include('forma-pago.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
