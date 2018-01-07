<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('alive',true)->get();

        return view('administracion.usuarios.index')
            ->with('usuarios',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);

        return view('administracion.usuarios.show')
            ->with('usuario',$usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        return view('administracion.usuarios.edit')
            ->with('usuario',$usuario);
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
        $user = new user();

        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->celular = $request->celular;
        $user->ciudad = $request->ciudad;
        $user->departamento = $request->departamento;
        $user->pais = $request->pais;
        $user->direccion = $request->direccion;
        $user->password = bcrypt($request->password);
        $user->save();

        flash('Usuario  <b>'.$usuario->nombres." ".$usuario->apellidos.'</b> se editó exitosamente', 'danger')->important();
        return redirect()->route('usuarios.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->alive = false;
        $usuario->save();

        flash('Usuario <b>'.$usuario->nombres." ".$usuario->apellidos.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('usuarios.index');
    }

    public function activar($id)
    {
        $usuario = User::find($id);

        $usuario->alive = true;
        $usuario->save();

        flash('Usuario <b>'.$usuario->nombres." ".$usuario->apellidos.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('usuarios.index');
    }
}
