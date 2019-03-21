<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Usuarios = DB::table('users')->get();
        $Usuarios_Roles= DB::table('users_roles')->get();
        $Roles = DB::table('role')->get();

        return view('usuarios.index')->with([
            'Usuarios' => $Usuarios,
            'UsuariosRoles' => $Usuarios_Roles,
            'Roles' => $Roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Roles = DB::table('role')->get();
        $Workareas = DB::table('workarea')->get();
        return view('usuarios.create')->with([
            'Roles' => $Roles,
            'Workareas' => $Workareas
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
        $Validar = $this->validate($request,[
            'name' => 'string|required',
            'lastname' => 'string|required',
            'motherLastname' => 'string|required',
            'email' => 'email|required|unique:users,email',
            'userType' => 'exists:role,id',
            'user' => 'unique:users,user',
            'Workarea' => 'required:workarea,id'
        ]);

        $Registro = DB::table('users')->insertGetId([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'motherLastname' => $request->motherLastname,
            'user' => $request->user,
            'email' => $request->email,
            'user' => $request->user,
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users_roles')->insert([
            'users_id' => $Registro,
            'roles_id' => $request->userType,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('user_workarea')->insert([
            'user_id' => $Registro,
            'workarea_id' => $request->Workarea,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session()->forget(['UserData','Role']);

        $UserData = DB::table('users')->select(['*'])->where('id','=',$id)->first();
        $UserRole = DB::table('users_roles')->select(['roles_id'])->where('users_id','=',$UserData->id)->first();
        $Role = DB::table('role')->select(['name'])->where('id','=',$UserRole->roles_id)->first();
        $Puesto = DB::table('user_workarea')->select(['*'])
                    ->where('user_id','=',$UserData->id)->first()->workarea_id;
        dd($Puesto);

        return redirect()->back()->with([
            'UserData' => $UserData,
            'Role' => $Role->name,
            'Puesto' => $Puesto
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
        DB::table('users')->where('id','=',$id)->delete();
        return redirect()->back();
    }
}
