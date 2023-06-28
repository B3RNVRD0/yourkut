<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Postagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
{
  // ...

  public function index(Postagem $postagem)
  {

    $comentarios = $postagem->comentarios;


    return view('comentarios.show', compact('postagem', 'comentarios'));
  }


  public function create()
  {

    return view('comentarios.create');
  }
  public function store(Request $request)
  {

    $request->validate([
      'texto' => 'required|string',
      'postagem_id' => 'required|integer',
    ]);


    $user_id = Auth::id();

    Comentario::create([
      'texto' => $request->texto,
      'postagem_id' => $request->postagem_id,
      'user_id' => $user_id,
    ]);

    return redirect()->route('comentarios.show', ['postagem' => $request->postagem_id]);
  }



  public function edit(Comentario $comentario)
  {

    return view('comentarios.edit', compact('comentario'));
  }

  public function update(Request $request, Comentario $comentario)
  {

    $request->validate([
      'conteudo' => 'required|string',
    ]);

    $comentario->conteudo = $request->conteudo;
    $comentario->save();
  }

  public function destroy(Comentario $comentario)
  {

    $comentario->delete();
  }
}
