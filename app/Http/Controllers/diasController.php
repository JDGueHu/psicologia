<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Dia;
use App\Dia_Horas;

class diasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias = Dia::orderby('numero_dia')->get();

        return view('configuracion.dias.index')
            ->with('dias',$dias);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'dia' => 'unique:dias'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.dias.create');
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

        $dia = new Dia();

        $dia->dia = $request->dia;
        $dia->dia_ingles = $request->dia_ingles;
        $dia->numero_dia = $request->numero_dia;
        $dia->costo = $request->costo;
        $dia->save();

        flash('Día  <b>'.$dia->dia.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('dias.index');  
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dia = Dia::find($id);
        $horas_selecionadas = Dia_Horas::where('dia_id','=',$id)->get();

        return view('configuracion.dias.show')
            ->with('dia',$dia)
            ->with('horas_selecionadas',$horas_selecionadas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dia = Dia::find($id);

        return view('configuracion.dias.edit')
            ->with('dia',$dia);
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
        //$this->validator($request->all())->validate();

        $dia = Dia::find($id);

        $dia->dia = $request->dia;
        $dia->dia_ingles = $request->dia_ingles;
        $dia->numero_dia = $request->numero_dia;
        $dia->costo = $request->costo;
        $dia->save();

        flash('Día  <b>'.$dia->dia.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('dias.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dia = Dia::find($id);

        $dia->alive = false;
        $dia->save();

        flash('Día <b>'.$dia->dia.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('dias.index');
    }

    public function activar($id)
    {
        $dia = Dia::find($id);

        $dia->alive = true;
        $dia->save();

        flash('Día <b>'.$dia->dia.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('dias.index');
    }

    public function asociar_horas($id)
    {
        $dia = Dia::find($id);
        $horas = [
            '5:00am'=>'5:00am',
            '6:00am'=>'6:00am',
            '7:00am'=>'7:00am',
            '8:00am'=>'8:00am',
            '9:00am'=>'9:00am',
            '10:00am'=>'10:00am',
            '11:00am'=>'11:00am',
            '12:00pm'=>'12:00pm',
            '1:00pm'=>'1:00pm',
            '2:00pm'=>'2:00pm',
            '3:00pm'=>'3:00pm',
            '4:00pm'=>'4:00pm',
            '5:00pm'=>'5:00pm',
            '6:00pm'=>'6:00pm',
            '7:00pm'=>'7:00pm',
            '8:00pm'=>'8:00pm'
        ];
        $horas_selecionadas = Dia_Horas::where('dia_id','=',$id)->pluck('hora');
        //dd($horas_selecionadas);

        return view('configuracion.dias.horas')
            ->with('dia',$dia)
            ->with('horas',$horas)
            ->with('horas_selecionadas',$horas_selecionadas);
    }

    public function asociar_horas_store(Request $request)
    {   
        //Primero se elimina lo que ya está asociado
        foreach ($request->horas as $value) {
            Dia_Horas::where('dia_id', '=', $request->dia_id)
                     ->where('hora','=',$value)
                     ->delete();
        }

        //Se guarda cada hora asociada al dia
        foreach ($request->horas as $value) {

            $dia_horas = new Dia_Horas();

            $dia_horas->dia_id = $request->dia_id;
            $dia_horas->hora = $value;
            $dia_horas->costo = $request->costo;
            $dia_horas->save();
        }

        flash('Se activaron las horas para servicio en el día <b>'.$request->dia.'</b> exitosamente', 'success')->important();
        return redirect()->route('dias.index');
    }

    public function desvincular_horas($id)
    {
        $dia = Dia::find($id);

        Dia_Horas::where('dia_id', '=', $id)
            ->delete();

        flash('Se desvincularon las horas para servicio en el día <b>'.$dia->dia.'</b> exitosamente', 'danger')->important();
        return redirect()->route('dias.index');
    }
}
