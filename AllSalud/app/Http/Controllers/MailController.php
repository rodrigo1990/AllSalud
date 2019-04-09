<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ConsultasFormulario;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function enviarMail(Request $request){

    	Mail::to("mcd77.1990@gmail.com")->send(new ConsultasFormulario($request));

    	return json_encode("mail enviado");
    	
    }
}
