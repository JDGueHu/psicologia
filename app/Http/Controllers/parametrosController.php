<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Parametro;

class parametrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros = Parametro::orderby('llave')->get();

        return view('configuracion.parametros.index')
            ->with('parametros',$parametros);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'llave' => 'unique:parametros'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.parametros.create');
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

        $parametro = new Parametro();

        $parametro->llave = strtoupper($request->llave);
        $parametro->valor = $request->valor;
        $parametro->save();

        flash('Parámetro  <b>'.$parametro->llave.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('parametro.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parametro = Parametro::find($id);

        return view('configuracion.parametros.show')
            ->with('parametro',$parametro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parametro = Parametro::find($id);

        return view('configuracion.parametros.edit')
            ->with('parametro',$parametro);
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
        $parametro = Parametro::find($id);

        $parametro->llave = strtoupper($request->llave);
        $parametro->valor = $request->valor;
        $parametro->save();

        flash('Parámetro  <b>'.$parametro->llave.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('parametro.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parametro = Parametro::find($id);

        $parametro->alive = false;
        $parametro->save();

        flash('Parámetro <b>'.$parametro->llave.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('parametro.index');
    }

    public function activar($id)
    {
        $parametro = Parametro::find($id);

        $parametro->alive = true;
        $parametro->save();

        flash('Parámetro <b>'.$parametro->llave.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('parametro.index');
    }

    public function consultar_parametros(Request $request)
    {   
        if($request->ajax()){   

            $parametros = Parametro::where('alive', true)->get();

            return response($parametros);
        }
    }
}
