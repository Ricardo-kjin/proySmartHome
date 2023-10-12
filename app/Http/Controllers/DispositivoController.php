<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
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
        $dispositivos = Dispositivo::all();
        return view('dispositivos.index', compact('dispositivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dispositivos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $rules=[
            'nombre' => 'required|min:5',
            'codigo' => 'required|min:4',
        ];
        $messages=[
            'nombre.required'=>'El nombre del dispositivo es obligatorio',
            'nombre.min'=>'El nombre del dispositivo debe tener mas de 5 caracteres',
            'codigo.required'=>'El codigo del dispositivo es obligatorio',
            'codigo.min'=>'El codigo del dispositivo debe tener mas de 4 caracteres',
        ];
        $this->validate($request,$rules,$messages);

        $dispositivo= new Dispositivo();
        $dispositivo->nombre_dispositivo=$request->input('nombre');
        $dispositivo->codigo=$request->input('codigo');
        $dispositivo->estado="Deshabilitado";
        $dispositivo->descripcion=$request->input('descripcion');
        $dispositivo->user_id=auth()->user()->id;
        $dispositivo->save();

        $notification= 'El dispositivo se ha creado correctamente';

        return redirect('/dispositivos')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispositivo $dispositivo)
    {
        return view('dispositivos.edit',compact('dispositivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        // dd($dispositivo);
        $rules=[
            'nombre' => 'required|min:5',
            'codigo' => 'required|min:4',
        ];
        $messages=[
            'nombre.required'=>'El nombre del dispositivo es obligatorio',
            'nombre.min'=>'El nombre del dispositivo debe tener mas de 5 caracteres',
            'codigo.required'=>'El codigo del dispositivo es obligatorio',
            'codigo.min'=>'El codigo del dispositivo debe tener mas de 4 caracteres',
        ];
        $this->validate($request,$rules,$messages);

        $dispositivo->nombre_dispositivo=$request->input('nombre');
        $dispositivo->codigo=$request->input('codigo');
        $dispositivo->estado="Deshabilitado";
        $dispositivo->descripcion=$request->input('descripcion');
        $dispositivo->user_id=auth()->user()->id;
        $dispositivo->save();
        $notification= 'Datos actualizados correctamente';

        return redirect('/dispositivos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositivo $dispositivo)
    {
        // dd($dispositivo);
        $delete_name=$dispositivo->nombre_dispositivo;
        $dispositivo->delete();
        $notification= 'Dispositivo '.$delete_name.'eliminado correctamente';

        return redirect('/dispositivos')->with(compact('notification'));
    }
}
