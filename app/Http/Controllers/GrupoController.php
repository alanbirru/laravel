<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['grupos']=Grupo::paginate(5);
        return view('grupo.index', $datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $datosGrupo = request()->all();
        $campos=[
            'semestre'=>'required|string|max:100',
            'grupo'=>'required|string|max:100',
            'turno'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);





        $datosGrupo =request()->except('_token');

        Grupo::insert($datosGrupo);

        // return response()->json($datosGrupo);
        return redirect('grupo')->with('mensaje', 'grupo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $grupo=Grupo::findOrFail($id);
        return view('grupo.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'semestre'=>'required|string|max:100',
            'grupo'=>'required|string|max:100',
            'turno'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);




        //
        $datosGrupo =request()->except(['_token','_method']);
        Grupo::where('id','=',$id)->update($datosGrupo);

        $grupo=Grupo::findOrFail($id);
        return view('grupo.edit', compact('grupo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Grupo::destroy($id);
        return redirect('grupo')->with('mensaje', 'Grupo Borrado');
    }
}
