<?php

namespace App\Http\Controllers\Auth;

use App\Models\Conta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:contas,email',
            'password' => 'required|confirmed',
        ]);

        Conta::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('criarpostagem');
    }
}
