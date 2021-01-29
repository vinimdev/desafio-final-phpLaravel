@extends('layout.template')
@section('main')
    @include('providers.partials.search')
    @include('layout.messages')
    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Listagem de Fornecedores</h1>
            <a href="{{route('provider.create')}}" class="btn btn-success">Cadastrar novo</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome do Fornecedor</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Data de Cadastro</th>
                <th scope="col" width="150"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($providers as $provider)
                <tr>
                    <td>{{$provider->id}}</td>
                    <td>{{$provider->name}}</td>
                    <td>{{$provider->email}}</td>
                    <td>{{$provider->phone}}</td>
                    <td>{{$provider->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('provider.edit', $provider->id) }}">Editar</a>
                        <a class="btn btn-danger btn-sm" onclick="deleteInDataBase('{{ route('provider.destroy', $provider->id) }}')">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <div class='mt-5'>
                {{$providers->appends([
                    'action' => request('action'),
                    'keyword' => request('keyword'),
                    'email' => request('email'),
                    'phone' => request('phone'),
                    'order_by' => request('order_by')
                    ])->links()}}
            </div>
        </table>
    </div>
@endsection
