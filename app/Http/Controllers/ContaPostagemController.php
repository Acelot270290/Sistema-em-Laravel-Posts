<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Postagen;
use Illuminate\Http\Request;

class ContaPostagemController extends Controller
{
    public function index(Conta $conta)
    {
        $postagem = $conta->postagens()->with(['conta'])->paginate(20);

        return view('users.posts.index', [
            'conta' => $conta,
            'postagem' => $postagem
        ]);

        return response()->json(
            Conta::get(),
            200
        );

    }

    public function listaPostagem(Postagen $postagens)
    {
        $postagem = $postagens->paginate(20);

        return view('home', [
            'postagem' => $postagem
        ]);
    }
}
