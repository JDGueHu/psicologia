<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Cita;
use App\User;
use App\Modalidad;
use App\LogCita;
use Carbon\Carbon;
use App\Parametro;

use Mail;
use App\Mail\email_usuario;
use App\Mail\email_admin;

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
        $cita = Cita::find($id);
        $usuario = User::find($cita->usuario_id);
        $modalidad = Modalidad::find($cita->modalidad_id);

        return view('administracion.citas.show')
            ->with('cita',$cita)
            ->with('modalidad',$modalidad)
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
        $cita = Cita::find($id);
        $usuario = User::find($cita->usuario_id);
        $modalidad = Modalidad::find($cita->modalidad_id);

        return view('administracion.citas.edit')
            ->with('cita',$cita)
            ->with('modalidad',$modalidad)
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
        $cita = Cita::find($id);

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
        
        flash('Cita  <b>'.$cita->consecutivo_cita.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('citas.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener los datos de la cita
        $cita = DB::table('citas')
                    ->join('modalidades', 'citas.modalidad_id', '=', 'modalidades.id')
                    ->where('citas.alive', true)
                    ->where('modalidades.alive', true)
                    ->where('citas.id', '=', $id)
                    ->select('citas.*', 'modalidades.tipo_modalidad')
                    ->get();

        // Obtener email para envio de correo al administrador
        $email_admin = DB::table('parametros')
                    ->where('parametros.alive', true)
                    ->where('parametros.llave','=', 'EMAIL_ADMIN')
                    ->select('parametros.*')
                    ->get();

        //Cancelar cita      
        $cita_cancelada = Cita::find($cita[0]->id);

        $cita_cancelada->estado = 'Cancelada';
        $cita_cancelada->save();

        //Usuario de la cita
        $usuario = User::find($cita[0]->usuario_id);

        // //Correo para el usuario
        // Mail::to($usuario->email)
        //     ->send(new email_usuario(                
        //         'Cancelada',
        //         $email_admin[0]->valor,
        //         $cita)
        //     );

        // //Correo para el admin
        // Mail::to($email_admin[0]->valor)
        //     ->send(new email_admin(                
        //         'Cancelada',
        //         $email_admin[0]->valor,
        //         $cita)
        //     );

        flash('Cita <b>'.$cita_cancelada->consecutivo_cita.'</b> se cancelado exitosamente', 'danger')->important();
        return redirect()->route('citas.index');
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

                //Guardar en el log el movimiento de la cita
                $log = new LogCita();  
                $log->cita_id = $cita->id;
                $log->user_id = Auth::user()->id;
                $log->accion_sobre_cita = 'Creacion';
                $log->motivo_accíon = 'Creacion';
                    $date = Carbon::now(); //Fecha actual
                $log->fecha = $date->subHours(5); 
                $log->save();

                // Obtener email para envio de correo al administrador
                $email_admin = DB::table('parametros')
                    ->where('parametros.alive', true)
                    ->where('parametros.llave','=', 'EMAIL_ADMIN')
                    ->select('parametros.*')
                    ->get();

                // Obtener email para envio de correo al usuario
                $user = User::find(Auth::user()->id);

                //Correo para el usuario
                Mail::to($user->email)
                    ->send(new email_usuario(                
                        'Por confirmar',
                        $email_admin[0]->valor,
                        $cita)
                    );

                //Correo para el admin
                Mail::to($email_admin[0]->valor)
                    ->send(new email_admin(                
                        'Por confirmar',
                        $email_admin[0]->valor,
                        $cita)
                    );


                $respuesta = '<p>Su cita se ha apartado exitosamente.<br>El consecutivo de su cita es el <b>'.$cita->consecutivo_cita.'</b>.<br>Recibirá un correo con los detalles de la cita.</p>';
            }
            else{
                $respuesta = "<p>No se pudo apartar la cita, por favor intente apartarla en otra fecha y hora</p>";
            }

            return response($respuesta);
        }
    }

    public function consultar_cita(Request $request)
    {   
        if($request->ajax()){ 

            $cita = DB::table('citas')
                        ->join('modalidades', 'citas.modalidad_id', '=', 'modalidades.id')
                        ->where('citas.alive', true)
                        ->where('modalidades.alive', true)
                        ->where('citas.id', '=', $request->consecutivo)
                        ->select('citas.*', 'modalidades.tipo_modalidad')
                        ->get();

            return response($cita);
        }
    }
}
