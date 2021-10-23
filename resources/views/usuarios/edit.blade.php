@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuário: <strong>{{ $resultado->id }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif   
                    <form action="{{ url('usuarios/update', $resultado->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" value="{{ $resultado->name }}">
                        </div>                        
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" value="{{ $resultado->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary"> Confirmar </button>
                        <a href="{{ url('usuarios') }}" class="btn btn-secondary"> Voltar </a>
                    </form>                               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection