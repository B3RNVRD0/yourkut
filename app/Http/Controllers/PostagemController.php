<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comentario;
use App\Models\Categoria;




class PostagemController extends Controller
{

    public function index()
    {
        $postagens = Postagem::all();
        $categorias = Categoria::all();

        return view('postagens.index', compact('postagens', 'categorias'));
    }


    public function postagensPorCategoria(Categoria $categoria)
    {
        $postagens = $categoria->postagens()->get();

        return view('postagens.categoria', compact('postagens', 'categoria'));
    }





    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string',
            'conteudo' => 'required|string',

        ]);


        $user = Auth::user();
        $postagem = new Postagem();
        $postagem->titulo = $request->titulo;
        $postagem->conteudo = $request->conteudo;

        $postagem->user_id = $user->id;
        $postagem->save();

        // Associar as categorias selecionadas à postagem
        $categoriasSelecionadas = $request->input('categorias');
        $postagem->categorias()->attach($categoriasSelecionadas);

        return redirect()->route('postagens.index');
    }

    public function edit($id)
    {
        $postagem = Postagem::find($id);
        $categorias = Categoria::all();

        return view('postagens.edit', compact('postagem', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string',
            'conteudo' => 'required|string',
        ]);

        $postagem = Postagem::find($id);

        $postagem->titulo = $request->titulo;
        $postagem->conteudo = $request->conteudo;

        $postagem->save();

        // Atualizar as categorias selecionadas
        $categoriasSelecionadas = $request->input('categorias');
        $postagem->categorias()->sync($categoriasSelecionadas);

        return redirect()->route('postagens.index');
    }

    public function destroy($id)
    {
        $postagem = Postagem::find($id);

        // Remover as categorias relacionadas
        $postagem->categorias()->detach();

        // Excluir os comentários associados à postagem
        $postagem->comentarios()->delete();

        // Excluir a postagem
        $postagem->delete();

        return redirect()->route('postagens.index');
    }


    public function showComentarios(Postagem $postagem)
    {
        $comentarios = $postagem->comentarios;
        return view('comentarios.show', compact('postagem', 'comentarios'));
    }

    public function storeComentario(Request $request, Postagem $postagem)
    {
        $request->validate([
            'texto' => 'required|string',
        ]);

        $comentario = new Comentario([
            'texto' => $request->texto,
            'user_id' => Auth::id(),
        ]);

        $postagem->comentarios()->save($comentario);

        return redirect()->route('comentarios.show', $postagem->id);
    }
}
