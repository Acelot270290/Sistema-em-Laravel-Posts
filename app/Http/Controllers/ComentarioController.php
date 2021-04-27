<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    
    public function index()
    {
        return back();
    }

    public function show(Comentario $comentario)
    {
        return view('posts.show', [
            'comentario' => $comentario
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'conteudo' => 'required',
            'postID' => 'required'
        ]);
        
        $comentario = new Comentario;

        $comentario->conta_id = Auth::user()->id;
        $comentario->postagen_id = $request->get('postID');
        $comentario->conteudo = $request->get('conteudo');
        
        $comentario->save();

        /*$request->user()->comentarios()->create(
            $this->'postagen_id' = $request->get('postID'),
            $this->'conteudo' = $request->get('conteudo'),
            );*/

        return back();
    }

    public function destroy(Comentario $comentario)
    {
        $user = Auth::user();

        if($user->id == $comentario->conta_id)
        {
            $comentario->delete();
        }

        return back();
    }
}
