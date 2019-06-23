<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Units = Unit::all();

        return view('units.index')->with([
            'medidas' => $Units
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create')->with([
            'Accion' => 'Crear'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator = $request->validate([
            'name' => 'required|unique:units,name|string',
            'description' => 'nullable',
            'abbreviation' => 'required|unique:units,abbreviation|string'
        ]);

        $unit = new Unit;
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->abbreviation = $request->abbreviation;
        $unit->save();

        return redirect(route('medidas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Unidad = Unit::where('id',$id)->first();

        return view('units.create')->with([
            'Accion' => 'Mostrar',
            'medida' => $Unidad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Unidad = Unit::where('id',$id)->first();

        return view('units.create')->with([
            'Accion' => 'Editar',
            'medida' => $Unidad
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Validate = $request->validate([
            'name' => 'required',
            'abbreviation' => 'required'
        ]);

        $unit = Unit::where('id',$id)->first();
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->abbreviation = $request->abbreviation;
        $unit->save();

        return redirect(route('medidas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $units = Unit::where('id',$id)->first()->storages()->count();

      if ($units == 0) {
        Unit::where('id',$id)->first()->delete();
        return redirect()->back();
      }else{
        return redirect()->back()->withErrors([
          'No se puede eliminar un registro que tenga productos'
        ]);
      }
    }
}
