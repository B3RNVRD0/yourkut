<!DOCTYPE html>
<html>

<head>
  <title>Comentários</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <a href="{{ route('postagens.index') }}" class="btn btn-secondary">Voltar</a>
  <div class="container mt-4">
    <p>Comentários da Postagem:</p>
    <h3>{{$postagem->titulo}}</h3>
    <p>{{$postagem->conteudo}}</p>


    <form action="{{ route('comentarios.store', ['postagem' => $postagem->id]) }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="texto">Novo Comentário:</label>
        <textarea class="form-control" name="texto" id="novoComentario" rows="3"></textarea>


        <button type="submit" class="btn btn-primary">Comentar</button>
    </form>
  </div>
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Comentários</h5>
      @foreach($comentarios as $comentario)
      <div class="card mb-3">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">{{$comentario->user->nome}}</h6>
          <p class="card-text">{{$comentario->texto}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>




  </div>
  </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>