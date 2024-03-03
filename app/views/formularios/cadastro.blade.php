@extends('layouts.main')

@section('title', 'CADASTRO DE PESSOA')

@section('content')
    <div class="container mt-5">
        <h2>Cadastro de Pessoa</h2>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        {{ Form::open(['url' => 'cadastrar-pessoa', 'method' => 'post']) }}

        <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Digite seu nome']) }}
            {{ $errors->first('nome', '<span class="text-danger">:message</span>') }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Digite seu email']) }}
            {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
        </div>

        <div class="form-group">
            {{ Form::label('cpf', 'CPF') }}
            {{ Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => 'Digite seu CPF']) }}
            {{ $errors->first('cpf', '<span class="text-danger">:message</span>') }}
        </div>

        <div class="form-group">
            {{ Form::label('telefone', 'Telefone') }}
            {{ Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Digite seu telefone']) }}
            {{ $errors->first('telefone', '<span class="text-danger">:message</span>') }}
        </div>

        <div class="form-group">
            {{ Form::submit('Cadastrar', ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}

        <div class="form-group">
            <a href="{{ URL::to('formulario-excel') }}" class="btn btn-primary">Adicionar via Arquivo CSV</a>
        </div>
    </div>
@endsection
