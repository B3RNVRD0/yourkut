<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
  public function showPostagens(Categoria $categoria)
  {
    $postagens = $categoria->postagens;

    return view('postagens.categoria', compact('postagens', 'categoria'));
  }
}
