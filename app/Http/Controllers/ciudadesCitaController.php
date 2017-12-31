<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CiudadCita;
use App\User;


class ciudadesCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = CiudadCita::orderby('ciudad')->get();

        return view('configuracion.ciudades.index')
            ->with('ciudades',$ciudades);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ciudad' => 'unique:ciudades_cita'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.ciudades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $ciudad = new CiudadCita();

        $ciudad->ciudad = $request->ciudad;
        $ciudad->municipio = $request->departamento;
        $ciudad->pais = $request->pais;
        $ciudad->save();

        flash('Ciudad  <b>'.$ciudad->ciudad.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('ciudad_cita.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad = CiudadCita::find($id);

        return view('configuracion.ciudades.show')
            ->with('ciudad',$ciudad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudad = CiudadCita::find($id);

        return view('configuracion.ciudades.edit')
            ->with('ciudad',$ciudad);
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
        $ciudad = CiudadCita::find($id);

        $ciudad->ciudad = $request->ciudad;
        $ciudad->municipio = $request->departamento;
        $ciudad->pais = $request->pais;
        $ciudad->save();

        flash('Ciudad  <b>'.$ciudad->ciudad.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('ciudad_cita.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad = CiudadCita::find($id);

        $ciudad->alive = false;
        $ciudad->save();

        flash('Ciudad <b>'.$ciudad->ciudad.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('ciudad_cita.index');
    }

    public function activar($id)
    {
        $ciudad = CiudadCita::find($id);

        $ciudad->alive = true;
        $ciudad->save();

        flash('Ciudad <b>'.$ciudad->ciudad.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('ciudad_cita.index');
    }

    public function consultar_ciudades(Request $request)
    {   
        if($request->ajax()){   

            $ciudades = CiudadCita::where('alive', true)->get();

            return response($ciudades);
        }
    }

    public function ciudad_usuario_logueado(Request $request)
    {   

        if($request->ajax()){

            $user = User::where('email','=',\Auth::user()->email)->get(); 

            return response($user);
        }
    }

    public function validar_ciudad_usuario_logueado(Request $request)
    {   

        if($request->ajax()){

            $ciudades = CiudadCita::where('alive', true)
                ->where('ciudad','=',\Auth::user()->ciudad)->get(); 

            return response($ciudades);
        }
    }
}
