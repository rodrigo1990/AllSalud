<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;

class FrontController extends Controller
{
    public function index()
    {	    
        return view('index',['provincias'=>Provincia::all()]);
    }
}
