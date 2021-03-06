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
        return view('almacen.create')->with([
          'storage' => Storage::where('id',$id)->first(),
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
        return view('almacen.create')->with([
          'storage' => Storage::where('id',$id)->first(),
          'Accion' => 'Editar',
          'trademarks' => Trademark::all(),
          'environments' => Environment::all(),
          'units' => Unit::all(),
          'categories' => DriveType::all(),
          'usages' => Usage::all(),
          'trashes' => TrashType::all()
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
      $storage = Storage::where('id',$id)->first();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $storage = Storage::where('id',$id)->first();

      if ($storage->stocks()->count() == 0) {
        $storage->delete();
      }

      return redirect(route('almacen.index'));
    }
}
