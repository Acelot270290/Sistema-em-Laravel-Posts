<?php

namespace App\Http\Controllers;

use App\Models\Postagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostagemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    
    public function index()
    {
        $posts = Postagen::latest()->with(['conta'])->paginate(20);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Postagen $post)
    {
        $comentarios = DB::table('comentarios')
                            ->select('*')
                            ->where('postagen_id', '=', $post->id)
                            ->get();

        return view('posts.show', [
            'post' => $post,
            'comentarios' => $comentarios
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'postagem' => 'required'
        ]);

        $request->user()->postagens()->create($request->only('titulo', 'postagem'));

        return back();
    }

    public function destroy(Postagen $post)
    {
        $user = Auth::user();

        if($user->id == $post->conta_id)
        {
            $post->delete();
        }

        return back();
    }
}
