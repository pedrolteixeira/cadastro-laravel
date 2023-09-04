<?php

namespace App\Http\Controllers;
use GuzzleHttp\Tests\Psr7\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FotoController extends Controller
{
    public function salvarFoto(Request $request){
        $user = Auth::user();

        $foto = $request->file('foto');
        $fileName = $foto->getClientOriginalName();
        $foto->storeAs('uploads', $fileName, 'public');
        $user->foto = $fileName;

        $user->save();

        return redirect('perfil');
    }

    public function removerFoto()
    {
        $user = Auth::user();
        $user->foto = '';
        $user->save();

        return redirect('perfil');
    }

}
