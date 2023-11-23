<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscritosController extends Controller
{
    public function index(){
        return view('inscritos.listado');
    }
}
