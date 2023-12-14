<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Events;
use Illuminate\Validation\Rule;

class EventosController extends Controller
{
    public function index(){
        $eventos = Events::with('user')->paginate(3); 
        return view('eventos.listado', ['events' => $eventos]);
    }

    public function form_registro(){
        return view('eventos.form_registro');
    }

    public function registrar(Request $request){
        $validator = Validator::make($request->all(), [
            'cod_evento' => 'required|string',
            'nom_evento' => 'required|string',
            'fecha_evento' => 'required|date',
            'hora_evento' => 'required|date_format:H:i',
            'lugar_evento' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $eventos = new Events();
        $eventos->codevento = $request->input('cod_evento');
        $eventos->nomevento = $request->input('nom_evento');
        $eventos->fecha = $request->input('fecha_evento');
        $eventos->hora = $request->input('hora_evento');
        $eventos->lugar = $request->input('lugar_evento');
        $eventos->user_id = auth()->id();
        if ($request->hasFile('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagen = date('YmdHis'). "." . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move($rutaGuardarImg, $imagen);
            $eventos->imagen = $imagen;
        }
        
        $eventos->save();
        return redirect()->route('listado_eventos');
    }

    public function form_edicion($id){
        $eventos = Events::findorFail($id);
        return view('eventos.form_edicion', ['events'=>$eventos]);
    }

    public function editar(Request $request, $id){
        $eventos = Events::findorFail($id);
        $eventos->nomevento = $request->input('nom_evento');
        $eventos->fecha = $request->input('fecha_evento');
        $eventos->hora = $request->input('hora_evento');
        $eventos->lugar = $request->input('lugar_evento');
        $eventos->user_id = auth()->id();
        if ($request->hasFile('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagen = date('YmdHis'). "." . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move($rutaGuardarImg, $imagen);
            $eventos->imagen = $imagen;
        }
        
        $eventos->save();
        return redirect()->route('listado_eventos');
    }

    public function eliminar($id){
        $eventos = Events::findorFail($id);
        $eventos->delete();

        return redirect()->route('listado_eventos');
    }
}
