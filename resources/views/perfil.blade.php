@extends('layouts.app')

@section('content')
<div class="container">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required disabled value="{{ auth()->user()->name }}">

    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" required disabled value="{{ auth()->user()->email }}">

    <br>

    <div>
        <form action="/salvar-endereco" method="POST">
        @csrf
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="{{ auth()->user()->cep }}" required>

            <label for="rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" value="{{ auth()->user()->rua }}" required>

            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{ auth()->user()->estado }}" required>

            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ auth()->user()->cidade }}" required >

            <button class="btn btn-primary" type="submit" style="margin-top: 20px">Salvar endereço</button>
        </form>
    </div>
</div>
@endsection