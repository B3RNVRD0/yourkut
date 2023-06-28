<!DOCTYPE html>
<html>

<head>
  <title>Postagens - {{ $categoria->nome }}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    <h1>Postagens - {{ $categoria->nome }}</h1>

    <hr>

    <div class="row">
      <div class="col-md-12">
        <h3>Criar Nova Postagem</h3>
        <form action="{{ route('postagens.store', ['categoria' => $categoria->id]) }}" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" required>
          </div>
          <div class="form-group">
            <label for="conteudo">Conteúdo:</label>
            <textarea class="form-control" name="conteudo" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Criar</button>
        </form>
      </div>
    </div>

    <hr>

    <div class="row">
      @if($postagens)
      @foreach($postagens as $postagem)
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $postagem->titulo }}</h5>
            <p class="card-text">{{ $postagem->conteudo }}</p>
            <p class="card-text">Postado por: {{ $postagem->user->nome }}</p>
            <p class="card-text">Categorias:
              @foreach($postagem->categorias as $categoria)
              <span class="badge badge-primary">{{ $categoria->nome }}</span>
              @endforeach
            </p>
            @if(auth()->user()->id == $postagem->user_id)
            <a href="{{ route('postagens.edit', ['id' => $postagem->id]) }}">Editar</a>
            <form action="{{ route('postagens.destroy', ['id' => $postagem->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
            @endif
            <form action="{{ route('postagens.comentarios', ['postagem' => $postagem->id]) }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-primary">Comentar</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>

    <hr>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>