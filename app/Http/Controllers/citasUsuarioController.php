<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Cita;
use App\User;
use App\Parametro;

use Mail;
use App\Mail\email_usuario;
use App\Mail\email_admin;

class citasUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $citas = DB::table('citas')
                    ->join('modalidades', 'citas.modalidad_id', '=', 'modalidades.id')
                    ->where('citas.alive', true)
                    ->where('citas.usuario_id','=',$user->id)
                    ->where('modalidades.alive', true)
                    ->select('citas.*', 'modalidades.tipo_modalidad')
                    ->get();

        return view('usuario.index')
            ->with('user',$user)
            ->with('citas',$citas);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => 'required|string|max:55',
            'apellidos' => 'required|string|max:55',
            'celular' => 'required|string|max:20',
            'ciudad' => 'required|string',
            'direccion' => 'required|string|max:400',
        ]);
    }

    protected function validator2(array $data)
    {
        return Validator::make($data, [
            'password' => 'string|min:6|confirmed',
        ]);
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
        $this->validator($request->all())->validate();

        $usuario = User::find($id);

        if($request->password != ""){
            $this->validator2($request->all())->validate();

            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->email = $usuario->email;
            $usuario->celular = $request->celular;
            $usuario->ciudad = $request->ciudad;
            $usuario->departamento = $request->departamento;
            $usuario->pais = $request->pais;
            $usuario->direccion = $request->direccion;
            $usuario->password = bcrypt($request->password);

        }else{

            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->email = $usuario->email;
            $usuario->celular = $request->celular;
            $usuario->ciudad = $request->ciudad;
            $usuario->departamento = $request->departamento;
            $usuario->pais = $request->pais;
            $usuario->direccion = $request->direccion;

        }

        $usuario->save();


        flash('Usuario <b>'.$usuario->email.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('datos_usuario.index');
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

    public function confirmar($id)
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
        
        //Confirmar cita      
        $cita_confirmada = Cita::find($cita[0]->id);

        $cita_confirmada->estado = 'Confirmada';
        $cita_confirmada->save();

        //Datos para envio de correos a usuario y administrador

        //Usuario de la cita
        $usuario = User::find($cita[0]->usuario_id);

        //dd($email_admin);

        //Correo para el usuario
        // Mail::to($usuario->email)
        //     ->send(new email_usuario(                
        //         'Confirmada',
        //         $email_admin[0]->valor,
        //         $cita)
        //     );

        // //Correo para el admin
        // Mail::to($email_admin[0]->valor)
        //     ->send(new email_admin(                
        //         'Confirmada',
        //         $email_admin[0]->valor,
        //         $cita)
        //     );

        // Mail::send(['text'=>'email.confirmacion_usuario'],['name','Juan'],function($message){
        //     $message->to('jdguehu@gmail.com','To Bitfunes')->subject('teest');
        //     $message->from('jdguehu@gmail.com','Juan');
        // });

        flash('Cita <b>'.$cita_confirmada->consecutivo_cita.'</b> se confirmó exitosamente', 'success')->important();
        return redirect()->route('datos_usuario.index');

    }

    public function cancelar(Request $request)
    {   

        if($request->ajax()){  

            // Obtener los datos de la cita
            $cita = DB::table('citas')
                        ->join('modalidades', 'citas.modalidad_id', '=', 'modalidades.id')
                        ->where('citas.alive', true)
                        ->where('modalidades.alive', true)
                        ->where('citas.id', '=', $request->cita_id)
                        ->select('citas.*', 'modalidades.tipo_modalidad')
                        ->get();

            // Obtener email para envio de correo al administrador
            $email_admin = DB::table('parametros')
                        ->where('parametros.alive', true)
                        ->where('parametros.llave','=', 'EMAIL_ADMIN')
                        ->select('parametros.*')
                        ->get();

            // Cancelar cita      
            $cita_cancelada = Cita::find($cita[0]->id);

            $cita_cancelada->estado = 'Cancelada';
            $cita_cancelada->save();
                
            // Usuario de la cita
            $usuario = User::find($cita[0]->usuario_id);

            // Correo para el usuario
            Mail::to($usuario->email)
                ->send(new email_usuario(                
                    'Cancelada',
                    $email_admin[0]->valor,
                    $cita)
                );

            // Correo para el admin
            Mail::to($email_admin[0]->valor)
                ->send(new email_admin(                
                    'Cancelada',
                    $email_admin[0]->valor,
                    $cita)
                );
                    
            return response($cita_cancelada);
        }  

    }

}
