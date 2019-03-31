<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUbicationRequest;
use DB;

class UbicationsController extends Controller
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
        $Ubicaciones = DB::table('ubication')->get();
        return view('ubicaciones.index')->with([
            'ubicaciones' => $Ubicaciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ubicaciones.create')->with(['Accion'=>'Crear']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUbicationRequest $request)
    {
        DB::table('ubication')->insert([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect(route('ubicaciones.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Ubicacion = DB::table('ubication')->where('id','=',$id)->first();

        return view('ubicaciones.create')->with([
            'ubicacion' => $Ubicacion,
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
        $Ubicacion = DB::table('ubication')->where('id','=',$id)->first();

        return view('ubicaciones.create')->with([
            'ubicacion' => $Ubicacion,
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

        DB::table('ubication')->where('id','=',$id)->update([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'updated_at' => now()
        ]);

        return redirect(route('ubicaciones.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Ubication = DB::table('storage_ubication')->where('ubication_id','=',$id)->count();
        if($Ubication==0){
            DB::table('ubication')->where('id','=',$id)->delete();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['No puedes eliminar una ubicación que tenga productos dentro']);
        }
    }
}
