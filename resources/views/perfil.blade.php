@extends('layouts.app')

@section('content')
<div class="container">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required disabled value="{{ auth()->user()->name }}">

    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" required disabled value="{{ auth()->user()->email }}">

    <br>

    <div>
        <form action="/remover-foto" method="POST">
            <label for="foto">Foto de Perfil</label>
            <br>
            @if (empty(Auth::user()->foto))
                <img src="{{ asset('storage/uploads/semFoto.png') }}" alt="Foto de Perfil" style="width: 100px;">
            @else
                <img src="{{ asset('storage/uploads/' . Auth::user()->foto) }}" alt="Foto de Perfil" style="width: 100px; height: 100px">
            @endif
            <br>
            <br>
            @csrf
            <button class="btn btn-danger" type="submit">Remover Foto</button>
        </form>
        <br>
        <form action="/salvar-foto" method="POST" enctype="multipart/form-data">
        @csrf

            <input type="file" class="form-control" id="foto" name="foto" required>

            <button class="btn btn-primary" type="submit" style="margin-top: 20px">Salvar Foto de Perfil</button>
        </form>
        <br>
    </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    $(document).on('blur', '#cep', function(){
        const cep = $(this).val();

        $.ajax({
            url: 'https://viacep.com.br/ws/'+cep+'/json',
            method: 'GET',
            dataType: 'JSON',
            success: function(data) {
                if (data.erro) {
                    alert('CEP inválido')
                }
                $('#rua').val(data.logradouro);
                $('#estado').val(data.uf);
                $('#cidade').val(data.localidade);
            }
        })
    })
</script>
@endsection