<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios=Horario::all();
        return view('horarios.index',compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dispositivos=Dispositivo::all();
        // dd($dispositivos);
        return view('horarios.create',compact('dispositivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $rules=[
            'nombre' => 'required|min:5',
            'hora' => ['required', 'regex:/^(0?[1-9]|1[0-2]):[0-5][0-9]$/'],
        ];
        $messages=[
            'nombre.required'=>'El nombre del horario es obligatorio',
            'nombre.min'=>'El nombre del horario debe tener mas de 5 caracteres',
            'hora.required' => 'La hora es obligatoria',
            'hora.regex' => 'El formato de la hora no es válido. Utiliza el formato 7:00',
        ];
        $this->validate($request,$rules,$messages);

        $horario= new Horario();
        $horario->nombre_horario=$request->input('nombre');
        $horario->hora=$request->input('hora');
        $horario->estado="Deshabilitado";
        $horario->descripcion=$request->input('descripcion');
        $horario->user_id=auth()->user()->id;
        $horario->dispositivo_id=$request->input('dispositivo_id');
        $horario->save();

        $notification= 'El Horario se ha creado correctamente';

        return redirect('/horarios')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $dispositivos=Dispositivo::all();
        return view('horarios.edit',compact('horario','dispositivos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        // dd($request);
        $rules=[
            'nombre' => 'required|min:5',
            'hora' => ['required', 'regex:/^(0?[1-9]|1[0-2]):[0-5][0-9]$/'],
        ];
        $messages=[
            'nombre.required'=>'El nombre del horario es obligatorio',
            'nombre.min'=>'El nombre del horario debe tener mas de 5 caracteres',
            'hora.required' => 'La hora es obligatoria',
            'hora.regex' => 'El formato de la hora no es válido. Utiliza el formato 7:00',
        ];
        // $this->validate($request,$rules,$messages);

        $horario->nombre_horario=$request->input('nombre');
        $horario->hora=$request->input('hora');
        $horario->estado="Deshabilitado";
        $horario->descripcion=$request->input('descripcion');
        $horario->user_id=auth()->user()->id;
        $horario->dispositivo_id=$request->input('dispositivo_id');
        $horario->save();

        $notification= 'El Horario se ha actualizado correctamente';

        return redirect('/horarios')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }

    public function actualizarestado(Request $request, String $id)
    {
        $horario = Horario::findOrFail($id);
        $dispositivo = $horario->dispositivo; // Obtener el dispositivo asociado al horario

        // Cambiar el estado del horario
        $horario->estado = $horario->estado == 'habilitado' ? 'deshabilitado' : 'habilitado';
        $horario->save();

        // Verificar si el dispositivo está vinculado a otro horario
        $otrosHorarios = Horario::where('dispositivo_id', $dispositivo->id)
            ->where('id', '!=', $id)
            ->exists();

        if (!$otrosHorarios) {

            // Cambiar el estado del dispositivo solo si no está vinculado a otros horarios
            $dispositivo->estado = $horario->estado;
            $dispositivo->save();

            $notification="Estado del horario y dispositivo actualizado correctamente.";
            return redirect('/horarios')->with(compact('notification'));
        }else {
            $notification="Estado del horario actualizado correctamente";
            return redirect('/horarios')->with(compact('notification'));

        }
    }
}
