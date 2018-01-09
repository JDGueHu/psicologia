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
        $usuarios = User::get();

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
        $usuario = User::find($id);

        //dd($usuario);

        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        $usuario->celular = $request->celular;
        $usuario->ciudad = $request->ciudad;
        $usuario->departamento = $request->departamento;
        $usuario->pais = $request->pais;
        $usuario->direccion = $request->direccion;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        flash('Usuario  <b>'.$usuario->nombres." ".$usuario->apellidos.'</b> se editó exitosamente', 'warning')->important();
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
