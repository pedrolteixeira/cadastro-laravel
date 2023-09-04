<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{   
    public function salvarEndereco(Request $request)
    {
        $request->validate([
            'cep' => 'required',
            'rua' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
        ]);
    
        $user = Auth::user();

        $user->cep = $request->cep;
        $user->rua = $request->rua;
        $user->estado = $request->estado;
        $user->cidade = $request->cidade;
        
        $user->save();

        return redirect('perfil');
    }
}
