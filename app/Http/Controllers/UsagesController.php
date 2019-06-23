<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usage;


class UsagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Usages = Usage::all();

        return view('usages.index')->with([
            'usos' => $Usages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usages.create')->with([
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
        $Validate = $request->validate([
             'name' => 'required',
             'description' => 'required'
        ]);

        $usage = new Usage;
        $usage->name = $request->name;
        $usage->description = $request->description;
        $usage->save();

        return redirect(route('usos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Uso = Usage::where('id',$id)->first();

        return view('usages.create')->with([
            'uso' => $Uso,
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
        $uso = Usage::where('id',$id)->first();

        return view('usages.create')->with([
            'uso' => $uso,
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

        $usage = Usage::where('id',$id)->first();
        $usage->name = $request->name;
        $usage->description = $request->description;
        $usage->save();

        return redirect(route('usos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $usages = Usage::where('id',$id)->first()->storages()->count();

      if ($usages == 0) {
        Usage::destroy($id);
        return redirect()->back();
      }else{
        return redirect()->back()->withErrors([
          'No puedes eliminar una marca que tenga productos dentro'
        ]);
      }
    }
}
