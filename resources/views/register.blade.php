@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Registrar</div>

        <div class="card-body">
          <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="name">Nome:</label>
              <input type="text" name="nome" id="nome" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="senha">Senha:</label>
              <input type="senha" name="senha" id="senha" class="form-control @error('senha') is-invalid @enderror">
              @error('senha')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="senha_confirmation">Confirmar Senha:</label>
              <input type="senha" name="senha_confirmation" id="senha_confirmation" class="form-control">
            </div>

            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
          </form>
        </div>

        <div class="card-footer text-center">
          <p>Já tem uma conta? <a href="{{ route('login.form') }}">Faça login</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection