@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('usuarios/new')}}">Novo Usuário</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif                     
                    <h1>Lista de Usuários</h1>                   
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuarios as $u)
                          <tr>
                            <th scope="row"> {{ $u->id }} </th>
                            <td> {{ $u->name }} </td>
                            <td> {{ $u->email }} </td>
                            <td> <a href="usuarios/edit/{{$u->id}}" class="btn btn-info">Editar</a> </td>
                            <form action="{{ url('usuarios/deletar', $u->id) }}" method="post">
                                @csrf
                                @method("delete")
                                <td> <a href="usuarios/deletar/{{$u->id}}" class="btn btn-danger">Deletar</a> </td>
                            </form>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection