@extends('layouts.app')

@section('content')
<div class="container">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required disabled value="{{ auth()->user()->name }}">

    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" required disabled value="{{ auth()->user()->email }}">

    <br>
</div>
@endsection