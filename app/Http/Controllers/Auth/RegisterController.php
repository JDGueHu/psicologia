<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => 'required|string|max:55',
            'apellidos' => 'required|string|max:55',
            'email' => 'required|string|email|max:100|unique:users',
            'celular' => 'required|string|max:20',
            'ciudad' => 'required',
            'direccion' => 'required|string|max:400',
            'password' => 'string|min:6|confirmed',
            'politicas_tratamiento_datos' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//     protected function create(array $data)
//     {
//         return User::create([
//             'name' => $data['name'],
//             'email' => $data['email'],
//             'password' => bcrypt($data['password']),
//         ]);
//     }

     protected function registrarseStore(Request $request)
    {
        $this->validator($request->all())->validate();
        //dd($request->input('g-recaptcha-response'));
        $token = $request->input('g-recaptcha-response');

        if($token){

            $client = new Client();
            
            //GuzzleHttp( version 5.0 )
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
                'body' => [
                    'secret' => '6LdTsU0UAAAAAFxppGfSwM1faGlpfHEveJGaeayg',
                    'response' => $token
                ]
            ]);
            
            $response = json_decode($response->getBody());
            //dd($response);

            if($response->success == true){
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
                
                return redirect()->route('login');
            }else{
                
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }
 }
