@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Cadastro de fornecedores</h1>
            <a href="{{route('provider.index')}}" class="btn btn-primary">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{route('provider.store')}}" method="POST">

        @csrf
        <input type="hidden" name="active" id="active" value="1">
        @include('providers.partials.form')

    </form>

@endsection
