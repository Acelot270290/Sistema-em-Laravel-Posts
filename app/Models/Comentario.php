<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'conteudo'
    ];

    public function conta()
    {
        return $this->belongsTo(Conta::class);
    }

    public function postagen()
    {
        return $this->belongsTo(Postagen::class);
    }
}
