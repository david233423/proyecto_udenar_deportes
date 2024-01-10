<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inscritos;

class InscritosController extends Controller
{
    public function index(){
                // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario está autenticado
        if (!$user) {
            // Manejar la lógica para usuarios no autenticados
            // Puedes redirigirlos a la página de inicio de sesión, por ejemplo
            return redirect()->route('login');
        }



        $juegosInscritos = Inscritos::all();

        return view('inscritos.listado',  compact('juegosInscritos'));

    }

}
