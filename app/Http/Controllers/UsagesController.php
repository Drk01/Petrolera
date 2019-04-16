<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $Usages = DB::table('usage')->get();

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

        DB::table('usage')->insert([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'created_at' => now(),
            'updated_at' => now()
        ]);

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
        $Uso = DB::table('usage')->where('id',$id)->first();

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
        $uso = DB::table('usage')->where('id',$id)->first();

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
            'name' => ['required']
        ]);

        DB::table('usage')->where('id',$id)->update([
            'name' => trim($request->name),
            'description' => trim($request->description),
            'updated_at' => now()
        ]);

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
        $Usage = DB::table('storage_usage')->where('usage_id','=',$id)->count();
        if($Usage==0){
            DB::table('usage')->where('id','=',$id)->delete();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['No puedes eliminar una marca que tenga productos dentro']);
        }
    }
}
