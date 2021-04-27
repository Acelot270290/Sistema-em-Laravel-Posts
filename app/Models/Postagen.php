<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postagen extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'postagem'
    ];

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
