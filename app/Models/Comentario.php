<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{


  use HasFactory;
  protected $table = 'comentario';

  public $timestamps = false;

  protected $fillable = [
    'texto',
    'usuario_id',
    'postagem_id',
    'user_id'

  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
