@extends('layouts.app')

@section('template_title')
    Crear Factura
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <span class="card-title">Crear Factura</span>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('facturas.store') }}">
                        @csrf

                        @include('factura.form')

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
