<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPaginas extends Controller
{
    public function say($name){
        echo '<h1>Hola '.$name.', probando la página </h1>?';
        return view('homepage');
    }
}
