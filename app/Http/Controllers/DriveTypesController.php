<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DriveTypesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categorias = DB::table('driveType')->get();
        return view('categorias.index')->with([
            'categorias' => $Categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create')->with([
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
            'name' => 'required|unique:driveType,name',
            'description' => 'required'
        ]);

        DB::table('driveType')->insert([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Categoria = DB::table('driveType')->where('id','=',$id)->first();
        return view('categorias.create')->with([
            'Accion' => 'Mostrar',
            'categoria' => $Categoria
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
        $Categoria = DB::table('driveType')->where('id','=',$id)->first();

        return view('categorias.create')->with([
            'Accion' => 'Editar',
            'categoria' => $Categoria
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
            'description' => 'required'
        ]);

        DB::table('driveType')->where('id','=',$id)->update([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'updated_at' => now()
        ]);

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $StorageDrivetype = DB::table('storage_type')->where('driveType_id','=',$id)->count();
        if($StorageDrivetype==0){
            DB::table('trademark')->where('id','=',$id)->delete();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['No puedes eliminar una categoría que tenga productos dentro']);
        }
    }
}
