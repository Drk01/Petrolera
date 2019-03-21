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
        return view('almacen.All')->with([
            'user'=>Auth::user()->user,
            'storage' => DB::table('storage')->select(['*'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DB::table('type')->get();
        return view('almacen.create')->with(['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validar = $this->validate(request(), [
            'productName' => 'required|string|',
            'description' => 'required|string',
            'quantityItems' => 'required|string',
            'types' => 'required'
        ]);

        DB::table('storage')->insert([
            'id' => DB::table('storage')->count() + 1,
            'productName' => $request->productName,
            'description' => $request->description,
            'quantityItems' => $request->quantityItems,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($request->types as $type) {
            DB::table('storage_type')->insert([
                'id' => DB::table('storage_type')->count()+1,
                'storage_id' => DB::table('storage')->count(),
                'type_id' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect(route('almacen.create'));
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
