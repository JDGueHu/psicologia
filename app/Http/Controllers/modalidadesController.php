<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modalidad;

class modalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidades = Modalidad::get();

        return view('configuracion.modalidades.index')
            ->with('modalidades',$modalidades);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tipo_modalidad' => 'unique:modalidades'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.modalidades.create');
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
        
        $modalidad = new Modalidad();

        $modalidad->costo = $request->costo;
        $modalidad->detalles = $request->detalles;
        $modalidad->tipo_modalidad = $request->tipo_modalidad;
        $modalidad->save();

        flash('Modalidad <b>'.$modalidad->modalidad.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('modalidad.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modalidad = Modalidad::find($id);

        return view('configuracion.modalidades.show')
            ->with('modalidad',$modalidad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modalidad = Modalidad::find($id);

        return view('configuracion.modalidades.edit')
            ->with('modalidad',$modalidad);
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
        $modalidad = Modalidad::find($id);

        $modalidad->costo = $request->costo;
        $modalidad->detalles = $request->detalles;
        $modalidad->tipo_modalidad = $request->tipo_modalidad;
        $modalidad->save();

        flash('Modalidad <b>'.$modalidad->modalidad.'</b> se creó exitosamente', 'warning')->important();
        return redirect()->route('modalidad.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidad = Modalidad::find($id);

        $modalidad->alive = false;
        $modalidad->save();

        flash('Modalidad <b>'.$modalidad->modalidad.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('modalidad.index');
    }

    public function activar($id)
    {
        $modalidad = Modalidad::find($id);

        $modalidad->alive = true;
        $modalidad->save();

        flash('Modalidad <b>'.$modalidad->modalidad.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('modalidad.index');
    }

    public function consultar_modalidades(Request $request)
    {   
        if($request->ajax()){   

            $modalidades = Modalidad::get();

            return response($modalidades);
        }
    }
}
