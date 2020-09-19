<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\Funciones;
use App\Http\Requests\ContactRequest;

class MailController extends Controller
{
	use Funciones;

    public function contacto(ContactRequest $req){
        $statusmail = $this->enviarContacto($req);
        return response()->json(['status'=> $statusmail['status'], 'error' => ''], 200);
    }
}
