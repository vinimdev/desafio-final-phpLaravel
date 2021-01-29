@extends('layout.template')
@section('main')
    @include('users.partials.search')
    @include('layout.messages')
    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Listagem de Usuários</h1>
            <a href="{{route('user.create')}}" class="btn btn-success">Cadastrar novo</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome do Usuário</th>
                <th scope="col">E-mail</th>
                <th scope="col">Data de Cadastro</th>
                <th scope="col" width="150"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $user->id) }}">Editar</a>
                        <a class="btn btn-danger btn-sm" onclick="deleteInDataBase('{{ route('user.destroy', $user->id) }}')">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <div class='mt-5'>
                {{$users->appends([
                    'action' => request('action'),
                    'keyword' => request('keyword'),
                    'order_by' => request('order_by')
                    ])->links()}}
            </div>
        </table>
    </div>
@endsection
