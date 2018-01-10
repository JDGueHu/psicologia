<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Cita;

class citasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::get();

        $citas = DB::table('citas')
                    ->join('users', 'citas.usuario_id', '=', 'users.id')
                    ->select('citas.*', 'users.nombres', 'users.apellidos')
                    ->get();

        return view('administracion.citas.index')
            ->with('citas',$citas);
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

    public function activar($id)
    {

    }

    public function consultar_disponibilidad(Request $request)
    {   
        if($request->ajax()){   

            // Si existen registro en la fecha y hora indicada por el usuario y su estado es
            // diferente de cancelada, NO HAY disponibilidad de lo contrario la hay

            $citas = Cita::where('alive', true)
                ->where('fecha', '=', $request->fecha)
                ->where('hora', '=', $request->hora)
                ->where('estado', '!=', 'Cancelada')
                ->get();

            return response($citas);
        }
    }

    public function apartar_cita(Request $request)
    {   
        if($request->ajax()){   

            //Doble validación para consultar disponibilidad
            // Si existen registro en la fecha y hora indicada por el usuario y su estado es
            // diferente de cancelada, NO HAY disponibilidad de lo contrario la hay
            $citas = Cita::where('alive', true)
                ->where('fecha', '=', $request->fecha)
                ->where('hora', '=', $request->hora)
                ->where('estado', '!=', 'Cancelada')
                ->get();
            $respuesta;

            //Si no hay citas en la fecha y hora creada solicitada por el usuario se separa la cita
            //sino, se notifica al usuario un error por disponibilidad
            if(count($citas)==0){

                // Obtener consecutvo mayor 
                $consecutivo = DB::table('citas')->max('consecutivo');

                if ($consecutivo == null) { $consecutivo = 0; }

                $cita = new Cita();

                $cita->consecutivo = $consecutivo + 1;
                $cita->consecutivo_cita = str_pad($consecutivo + 1, 6, "0", STR_PAD_LEFT);
                $cita->usuario_id = Auth::user()->id;
                $cita->fecha = $request->fecha;
                $cita->hora = $request->hora;
                $cita->modalidad_id = $request->modadlidad_cita;
                $cita->medio_virtual = $request->medio_virtual_cita;
                $cita->usuario_medio_virtual = $request->input_nombre_usuario;
                $cita->tipo_direccion = $request->tipo_direccion;
                if($request->tipo_direccion == 'mi_direccion'){
                    $cita->ciudad = $request->ciudad_user;
                    $cita->dirección = $request->direccion_user;
                }else{
                    $cita->ciudad = $request->ciudad;
                    $cita->dirección = $request->direccion_completa;                  
                }
                //El estado default de la cotización es Por confirmar, está definido en la migración
                $cita->save();                

                $respuesta = "Cita apartada exitosamente";
            }
            else{
                $respuesta = "Cita NO apartada exitosamente";
            }

            return response($respuesta);
        }
    }
}
