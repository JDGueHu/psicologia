<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\MotivoCancelacion;

class cancelacionCitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivos = MotivoCancelacion::orderby('motivo')->get();

        return view('configuracion.motivosCancelacion.index')
            ->with('motivos',$motivos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.motivosCancelacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $motivo = new MotivoCancelacion();

        $motivo->motivo = strtoupper($request->motivo);
        $motivo->save();

        flash('Motivo  <b>'.$motivo->motivo.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('motivoCancelacion.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motivo = MotivoCancelacion::find($id);

        return view('configuracion.motivosCancelacion.show')
            ->with('motivo',$motivo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motivo = MotivoCancelacion::find($id);

        return view('configuracion.motivosCancelacion.edit')
            ->with('motivo',$motivo);
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
        $motivo = MotivoCancelacion::find($id);

        $motivo->motivo = strtoupper($request->motivo);
        $motivo->save();

        flash('Motivo  <b>'.$motivo->motivo.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('motivoCancelacion.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motivo = MotivoCancelacion::find($id);

        $motivo->alive = false;
        $motivo->save();

        flash('Motivo <b>'.$motivo->motivo.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('motivoCancelacion.index');
    }

    public function activar($id)
    {
        $motivo = MotivoCancelacion::find($id);

        $motivo->alive = true;
        $motivo->save();

        flash('Motivo <b>'.$motivo->motivo.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('motivoCancelacion.index');
    }
}
