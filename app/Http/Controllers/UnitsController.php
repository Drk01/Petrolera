<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $Units = DB::table('units')->get();

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

        DB::table('units')->insert([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'abbreviation' => trim($request->abbreviation),
            'created_at' => now(),
            'updated_at' => now()
        ]);

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
        $Unidad = DB::table('units')->where('id','=',$id)->first();

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
        $Unidad = DB::table('units')->where('id','=',$id)->first();

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

        $Campo = DB::table('units')->where('id','=',$id)->update([
            'name' => trim($request->name),
            'description'=> trim($request->description),
            'abbreviation' => trim($request->abbreviation),
            'updated_at' => now()
        ]);

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
        $Medida = DB::table('storage_unit')->where('units_id','=',$id)->count();
        if($Medida==0){
            DB::table('units')->where('id','=',$id)->delete();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['No puedes eliminar una unidad de medida que tenga productos dentro']);
        }
    }
}
