<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AlmacenStoreRequest;
use Illuminate\Support\Facades\DB;
use App\Storage;
use App\Ubication;
use App\Trademark;
use App\Environment;
use App\Unit;
use App\DriveType;
use App\Usage;
use App\TrashType;

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
            'storages' => Storage::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.create')->with([
            'ubications' => Ubication::all(),
            'trademarks' => Trademark::all(),
            'enviroments' => Environment::all(),
            'units' => Unit::all(),
            'categories' => DriveType::all(),
            'usages' => Usage::all(),
            'trashes' => TrashType::all(),
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
        $storage = new Storage;
        $storage->name = $request->productName;
        $storage->description = $request->description;
        if($request->observations){
            $storage->observations = $request->observations;
        }
        $storage->save();

        $storage->trademarks()->sync($request->trademark);
        $storage->driveTypes()->sync($request->driveType);
        $storage->units()->sync([$request->units => ['size' => $request->cunit]]);
        $storage->environments()->sync($request->enviroment);
        $storage->usages()->sync($request->uses);
        $storage->trashTypes()->sync($request->trashtype);

        return redirect(route('almacen.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
