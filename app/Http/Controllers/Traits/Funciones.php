<?php

namespace App\Http\Controllers\Traits;

use App\Producto;

use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Validator;

use \App\Mail\productos;
use \App\Mail\productosAdmin;
use \App\Mail\AlertaStock;
use \App\Mail\Contacto;
use GuzzleHttp\Client;

trait Funciones
{

    public function validarCaptcha($token){
        $secret     = config('app.secret_recaptcha');

        if($token){
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
                'form_params' =>[
                    'secret'    => $secret,
                    'response'  => $token
                    ]
                ]);
            $result = json_decode($response->getBody()->getContents(), true);
            if($result->success){
                return array('status' => true, 'errors' => '');
            }else{
                return array('status' => false, 'errors' => $result['error-codes']);
            }
        }else{
            return array('status' => false, 'errors'  => 'falta el captcha');
        }
    }

    ///////* FUNCIONES PARA EL CONTACTO *//////

    public function enviarContacto($req){
        $data= array(
            'nombre' => $req->input('contacto.nombre'),
            'email' => $req->input('contacto.email'),
            'asunto' => $req->input('contacto.asunto'),
            'cuerpo' => $req->input('contacto.cuerpo')
            );
        $fromEmail = config('mail.from.address');
        $fromName = config('mail.from.name');

        Mail::to(config('mail.forward'))->send(new Contacto($data));

        return array('status' => true, 'errors' => '');
    }

}
