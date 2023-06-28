<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container mt-4">
    <h1>Login</h1>

    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control @error('senha') is-invalid @enderror" required>
            @error('senha')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <p>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>