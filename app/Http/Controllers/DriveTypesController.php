<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DriveType;

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
        $Categorias = DriveType::all();
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
            'name' => 'required|unique:drive_types,name',
            'description' => 'required'
        ]);

        $dtype = new DriveType();
        $dtype->name = $request->name;
        $dtype->description = $request->description;
        $dtype->save();

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
        $Categoria = DriveType::where('id',$id)->first();
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
        $Categoria = DriveType::where('id',$id)->first();

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

        $dtype = DriveType::where('id',$id)->first();
        $dtype->name = $request->name;
        $dtype->description = $request->description;
        $dtype->save();

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
      $dTypes = DriveType::where('id',$id)->first()->storages()->count();

      if ($dTypes == 0) {
        DriveType::where('id',$id)->first()->delete();
        return redirect()->back();
      }else{
        return redirect()->back()->withErrors([
          'No se puede eliminar un registro con productos dentro'
        ]);
      }
    }
}
