<!DOCTYPE html>
<html>

<head>
    <title>Yourkut</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .category-link {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 8px;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .category-link.active {
            background-color: #00adb5;
        }

        .btn-group-toggle .btn.active {
            background-color: #007bff;
            color: #fff;
        }
    </style>

</head>

<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Sair</button>
    </form>
    <div class="row mb-3">
        <div class="col-md-12">
            @foreach($categorias as $categoria)
            <a href="{{ route('postagens.categoria', ['categoria' => $categoria->id]) }}" class="category-link {{ Request::get('categoria') == $categoria->id ? 'active' : '' }}">
                {{ $categoria->nome }}
            </a>
            @endforeach
        </div>
    </div>


    <div class="container mt-4">
        <h1>Postagens</h1>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Criar Nova Postagem</h5>
                        <form action="{{ route('postagens.store') }}" method="POST">
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
                            <div class="form-group">
                                <label for="categorias">Categorias:</label>
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    @foreach($categorias as $categoria)
                                    <label class="btn btn-outline-primary">
                                        <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}"> {{ $categoria->nome }}
                                    </label>
                                    @endforeach
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary">Criar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach($postagens as $postagem)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$postagem->titulo}}</h5>
                <p class="card-text">{{$postagem->conteudo}}</p>
                <p class="card-text">Postado por: {{$postagem->user->nome}}</p>
                <p class="card-text">Categorias:
                    @foreach($postagem->categorias as $categoria)
                    <a href="{{ route('postagens.categoria', ['categoria' => $categoria->id]) }}" class="badge badge-primary">{{$categoria->nome}}</a>
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
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>