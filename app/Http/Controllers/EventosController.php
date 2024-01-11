<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Events;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

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

    public function inscribirse($id)
    {
        // Recuperar el evento por su ID
        $event = Events::find($id);

        // Verificar si el evento existe
        if (!$event) {
            abort(404); // O manejar de alguna manera que el evento no existe
        }

        // Resto del código para mostrar la vista con el formulario de inscripción
        return view('eventos.form_inscripcion', ['event' => $event]);
    }

public function guardarInscripcion(Request $request)
{
    // Validación de datos del formulario
    $request->validate([
        'codigo' => 'required|string|max:255',
        'carrera' => 'required|string|max:255',
        'semestre' => 'required|string|max:255',
        'numero_celular' => 'required|string|max:255',
    ]);
    $eventoId = $request->route('id');

     // Validar que el evento exista
     $event = Events::find($eventoId);
     if (!$event) {
         abort(404); // O manejar de alguna manera que el evento no existe
     }


    // Guardar los datos directamente en la base de datos
    $inscripcion = [
        'codigo' => $request->input('codigo'),
        'carrera' => $request->input('carrera'),
        'semestre' => $request->input('semestre'),
        'numero_celular' => $request->input('numero_celular'),
        'user_id' => auth()->id(),  
        'evento_codevento' => $event->id,        // Agrega otros campos según sea necesario
    ];

    
    try {
        \DB::table('inscripciones')->insert($inscripcion);
    } catch (\Exception $e) {
        \Log::error($e->getMessage());
        return redirect()->back()->withInput()->withErrors(['error' => 'Error al guardar la inscripción']);
    }
    // Redirigir al listado de inscritos
    return Redirect::route('listado_inscritos');
}


    
}
