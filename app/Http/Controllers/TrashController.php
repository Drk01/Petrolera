<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TrashController extends Controller
{
  public function __constructor()
  {
      $this->middleware('auth');
      $this->middleware('isAdmin')->except(['index','show']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trash.index')->with([
            'basuras' => DB::table('trashType')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trash.create')->with([
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
        $validate = $request->validate([
          'name' => 'required|string|unique:trashType,name',
          'description' => 'required|string'
        ]);

        DB::table('trashType')->insert([
          'name' => trim($request->name),
          'description' => trim($request->description),
          'created_at' => now(),
          'updated_at' => now()
        ]);

        return redirect(route('basuras.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('trash.create')->with([
        'basura' => DB::table('trashType')->where('id',$id)->first(),
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
      return view('trash.create')->with([
        'basura' => DB::table('trashType')->where('id',$id)->first(),
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
          'name' => 'required|string',
          'description' => 'required|string'
        ]);

        DB::table('trashType')->where('id',$id)->update([
          'name' => trim($request->name),
          'description' => trim($request->description),
          'updated_at' => now()
        ]);

        return redirect(route('basuras.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Basuras = DB::table('storage_trashType')->where('trashType_id',$id)->count();

        if ($Basuras == 0) {
          DB::table('trashType')->where('id','=',$id)->delete();
          return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['No puedes eliminar una marca que tenga productos dentro']);
        }
    }
}
