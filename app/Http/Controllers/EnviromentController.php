<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Environment;


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
        $Enviroment = Environment::all();

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
            'name' => 'required|unique:environments,name',
            'description' => 'required'
        ]);

        $e = new Environment;
        $e->name = $request->name;
        $e->description = $request->description;
        $e->save();

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
        $Enviroment = Environment::where('id',$id)->first();
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

        $e = Environment::where('id',$id)->first();
        $e->name = $request->name;
        $e->description = $request->description;
        $e->save();

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
      $e = Environment::where('id',$id)->first()->storages()->count();

      if ($e == 0) {
        Environment::where('id',$id)->first()->delete();
        return redirect()->back();
      }else{
        return back()->withErrors([
          'No se puede eliminar un campo que tenga registros dentro'
        ]);
      }
    }
}
