@extends('layouts.main')

@section('title', 'CADASTRO DE PESSOAS ATRAVÉS DE ARQUIVO EXCEL CSV')

@section('content')
    <div class="container mt-5">
        <h2>Cadastro Através de Arquivo Excel CSV</h2>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="form-group">
            {{ Form::open(['url' => 'upload-excel', 'method' => 'post', 'files' => true]) }}
            {{ Form::file('excel', ['class' => 'form-control-file mt-4']) }}
            {{ Form::submit('Enviar', ['class' => 'btn btn-primary mt-4']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
