<!DOCTYPE html>
<html>

<head>
    <title>Edit Postagem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Edit Postagem</h1>

        <form action="{{ route('postagens.update', ['id' => $postagem->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" name="titulo" value="{{ $postagem->titulo }}" required>
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo:</label>
                <textarea class="form-control" name="conteudo" rows="3" required>{{ $postagem->conteudo }}</textarea>
            </div>
            <div class="form-group">
                <label for="categorias">Categorias:</label>
                <div class="btn-group-toggle" data-toggle="buttons">
                    @foreach($categorias as $categoria)
                    <label class="btn btn-outline-primary">
                        <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}" {{ in_array($categoria->id, $postagem->categorias->pluck('id')->toArray()) ? 'checked' : '' }}>
                        {{ $categoria->nome }}
                    </label>
                    @endforeach
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>