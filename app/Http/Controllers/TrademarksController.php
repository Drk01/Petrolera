<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMarcaRequest;
use DB;

class TrademarksController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin')->except('show','index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Marcas = DB::table('trademark')->get();
        return view('marcas.index')->with(['Marcas'=>$Marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Accion = "Crear";
        return view('marcas.create')->with(['Accion' => $Accion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMarcaRequest $request)
    {
        DB::table('trademark')->insert([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'created_at' => now(),
            'updated_at' =>now()
        ]);

        return redirect(route('marcas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Marca = DB::table('trademark')->where('id','=',$id)->first();

        return view('marcas.create')->with([
            'Marca' => $Marca,
            'Accion' => 'Mostrar'
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
        $Marca = DB::table('trademark')->where('id','=',$id)->first();

        return view('marcas.create')->with([
            'Marca' => $Marca,
            'Accion' => 'Editar'
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
            'name' => 'required'
        ]);

        DB::table('trademark')->where('id','=',$id)->update([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'updated_at' => now()
        ]);

        return redirect(route('marcas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $StorageTrademark = DB::table('storage_trademark')->where('trademark_id','=',$id)->count();
        if($StorageTrademark==0){
            DB::table('trademark')->where('id','=',$id)->delete();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['No puedes eliminar una marca que tenga productos dentro']);
        }
    }
}

