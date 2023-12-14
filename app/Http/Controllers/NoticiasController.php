<?php
namespace App\Http\Controllers;

use App\Models\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticiasController extends Controller
{
    public function index()
    {
        $noticias = Noticias::paginate(3); // numero de paginas.
        return view('noticias.listado', compact('noticias'));
    }

    public function form_registro()
    {
        return view('noticias.form_registro');
    }

    public function registrar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo'=> 'required|string',
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Otros campos necesarios para tu formulario de registro
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $noticia = new Noticias();
        $noticia->codigo = $request->input("codigo");
        $noticia->titulo = $request->input('titulo');
        $noticia->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagen = date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move($rutaGuardarImg, $imagen);
            $noticia->imagen = $imagen;
        }


        $noticia->save();
        return redirect()->route('listado_noticias');
    }

    public function form_edicion($id)
    {
        $noticia = Noticias::findOrFail($id);
        return view('noticias.form_edicion', ['noticia' => $noticia]);
    }

    public function editar(Request $request, $id)
    {
        $noticia = Noticias::findOrFail($id);
        $noticia->titulo = $request->input('titulo');
        $noticia->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagen = date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move($rutaGuardarImg, $imagen);
            $noticia->imagen = $imagen;
        }


        $noticia->save();
        return redirect()->route('listado_noticias');
    }

    public function eliminar($id)
    {
        $noticia = Noticias::findOrFail($id);
        $noticia->delete();

        return redirect()->route('listado_noticias');
    }

    
}
