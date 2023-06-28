<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
  use HasFactory;
  protected $table = 'postagem';

  protected $fillable = [
    'titulo',
    'conteudo',
    'autor_id',
  ];

  public $timestamps = false;

  public function comentarios()
  {
    return $this->hasMany(Comentario::class);
  }

  public function categorias()
  {
    return $this->belongsToMany(Categoria::class, 'postagem_categoria', 'postagem_id', 'categoria_id');
  }


  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
