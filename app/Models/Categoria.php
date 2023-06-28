<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $table = 'categoria';


  public function postagens()
  {
    return $this->belongsToMany(Postagem::class, 'postagem_categoria', 'categoria_id', 'postagem_id');
  }
}
