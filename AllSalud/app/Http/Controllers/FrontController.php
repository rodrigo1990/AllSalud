<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use App\TipoEstablecimiento;

class FrontController extends Controller
{
    public function index()
    {	

        $provincias = Provincia::all();
        $tipos = TipoEstablecimiento::all();


        return view('index',compact('provincias','tipos'));
    }


    public function indexAdmin()
    {	
    	
    	
        return view('admin/index');
    }

    public function adminHome(){
        return view('admin/home');
    }


   
}
