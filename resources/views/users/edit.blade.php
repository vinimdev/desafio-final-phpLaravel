@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Atualização de usuários</h1>
            <a href="{{route('user.index')}}" class="btn btn-primary">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{route('user.update', $user->id)}}" method="POST">

        @csrf
        @method('put')
        @include('users.partials.form')
        <div class="col-md-5">
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmação de Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Senha">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <hr>
            <button type="submit" class="btn btn-success">Registrar usuário</button>
        </div>
    </div>
    </form>
@endsection
