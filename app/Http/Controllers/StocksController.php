<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use App\Ubication;
use App\Stock;
use App\User;

class StocksController extends Controller
{
    public function __constructor()
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
          'stocks' => Stock::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('existencias.create')->with([
          'Accion' => 'Crear',
          'storages' => Storage::all(),
          'ubications' => Ubication::all(),
          'users' => User::all()
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
        $stock = new Stock;
        $stock->partNumber = $request->stockKey;
        $stock->storage_id = $request->product;
        $stock->save();
        $stock->ubications()->sync($request->ubication);
        $stock->responsibles()->sync($request->responsible);

        return redirect(route('existencias.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 
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
