<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUbicationRequest;
use App\Ubication;

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
        $Ubicaciones = Ubication::all();
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
        $ubication = new Ubication;
        $ubication->name = $request->name;
        $ubication->description = $request->description;
        $ubication->save();

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
        $Ubicacion = Ubication::where('id',$id)->first();

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
            'name' => 'required',
            'description' => 'required'
        ]);

        $ubication = Ubication::where('id',$id)->first();
        $ubication->name = $request->name;
        $ubication->description = $request->description;
        $ubication->save();

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
      $Ubications = Ubication::where('id',$id)->first()->stocks()->count();

      if ($Ubications == 0) {
        Ubication::where('id',$id)->first()->delete();
        return redirect()->back();
      }else{
        return redirect()->back()->withErrors([
          'No se puede borrar una ubicación que tenga existencias'
        ]);
      }
    }
}
