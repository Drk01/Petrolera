<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AlmacenStoreRequest;
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
            'storage' => DB::table('storage')->get(),
            'storage_ubication' => DB::table('storage_ubication')->get(),
            'ubications' => DB::table('ubication')->get(),
            'users' => DB::table('users')->get(),
            'responsibles' => DB::table('storage_responsible')->get()
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
    public function store(AlmacenStoreRequest $request)
    {
        $productID = DB::table('storage')->insertGetId([
            'partNumber' => trim($request->partNumber),
            'productName' => trim($request->productName),
            'description' => trim($request->description),
            'observations' => trim($request->observations),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('storage_trademark')->insert([
            'storage_id' => $productID,
            'trademark_id' => trim($request->trademark),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($request->driveType as $type) {
            DB::table('storage_type')->insert([
                'storage_id' => $productID,
                'driveType_id' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('storage_unit')->insert([
            'storage_id' => $productID,
            'units_id' => trim($request->units),
            'quantity' => trim($request->cunit),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($request->enviroment as $enviroment) {
            DB::table('storage_enviroment')->insert([
                'storage_id' => $productID,
                'enviroment_id' => $enviroment,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('storage_ubication')->insert([
            'storage_id' => $productID,
            'ubication_id' => trim($request->ubication),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('storage_usage')->insert([
            'storage_id' => $productID,
            'usage_id' => trim($request->uses),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('storage_trashType')->insert([
            'storage_id' => $productID,
            'trashType_id' => trim($request->trash),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('storage_responsible')->insert([
            'storage_id' => $productID,
            'user_id' => trim($request->responsable),
            'created_at' => now(),
            'updated_at' => now()
        ]);

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
