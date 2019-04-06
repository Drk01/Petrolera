<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('almacen.index')->with([
            'user'=>Auth::user()->user,
            'storage' => DB::table('storage')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ubications = DB::table('ubication')->get();
        $trademarks = DB::table('trademark')->get();
        $enviroments = DB::table('enviroment')->get();
        $units = DB::table('units')->get();
        $categories = DB::table('driveType')->get();
        $usages = DB::table('usage')->get();
        $trashes = DB::table('trashType')->get();
        $responsables = DB::table('users')->get();

        return view('almacen.create')->with([
            'ubications' => $ubications,
            'trademarks' => $trademarks,
            'enviroments' => $enviroments,
            'units' => $units,
            'categories' => $categories,
            'usages' => $usages,
            'trashes' => $trashes,
            'responsables' => $responsables
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
        dd($request->all());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
