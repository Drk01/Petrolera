<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EnviromentController extends Controller
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
        $Enviroment = DB::table('enviroment')->get();

        return view('enviroment.index')->with([
            'ambientales' => $Enviroment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enviroment.create')->with([
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
            'name' => 'required|unique:enviroment,name',
            'description' => 'required'
        ]);

        DB::table('enviroment')->insert([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect(route('ambientales.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Enviroment = DB::table('enviroment')->where('id','=',$id)->first();
        return view('enviroment.create')->with([
            'Accion' => 'Mostrar',
            'ambiental' => $Enviroment
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
        $Enviroment = DB::table('enviroment')->where('id','=',$id)->first();

        return view('enviroment.create')->with([
            'Accion' => 'Editar',
            'ambiental' => $Enviroment
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

        DB::table('enviroment')->where('id','=',$id)->update([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'updated_at' => now()
        ]);

        return redirect(route('ambientales.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $StorageDrivetype = DB::table('storage_enviroment')->where('enviroment_id','=',$id)->count();
        if($StorageDrivetype==0){
            DB::table('enviroment')->where('id','=',$id)->delete();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['No puedes eliminar una precaución ambiental que tenga productos dentro']);
        }
    }
}
