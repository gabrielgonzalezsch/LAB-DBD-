<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Auditoria;
use Illuminate\Support\Facades\DB;

class ControllerAuditoria extends Controller
{
  public function mostrarTablaAuditoria(){
    $auditoria = DB::select('SELECT * FROM audits');
    return view('auditoria')->with('auditoria', $auditoria);
  }
}
