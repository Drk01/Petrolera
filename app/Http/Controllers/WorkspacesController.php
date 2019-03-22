<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkspacesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Workspaces = DB::table('workarea')->get(['*']);

        @$IsAdmin = DB::table('users_roles')->select(['*'])
            ->where('users_id', '=', (Auth()->user()->id))
            ->where('roles_id', '!=', 3)
            ->first()->id;

        if (!$IsAdmin) {
            $IsAdmin = null;
        }

        foreach ($Workspaces as $key => $Workspace) {
            $Workspaces[$key]->Trabajadores = DB::table('user_workarea')
                ->where('workarea_id', '=', $Workspaces[$key]->id)
                ->count();
        }

        return view('workspaces.index')->with([
            'Workspaces' => $Workspaces,
            'IsAdmin' => $IsAdmin,
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

        DB::table('workarea')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back();
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
        $Workspace = DB::table('workarea')->select(['*'])->where('id', '=', $id)->first();
        return view('workspaces.edit')
            ->with([
                'id' => $Workspace->id,
                'name' => $Workspace->name,
                'description' => $Workspace->description
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
        $Validar = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        DB::table('workarea')
            ->where('id', '=', $id)
            ->update (['name' => $request->name,
            'description' => $request->description,
            'updated_at' => now ()]);

        return redirect(route('workspaces.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('workarea')
            ->where('id','=',$id)
            ->delete();
        return redirect()->back();
    }
}
