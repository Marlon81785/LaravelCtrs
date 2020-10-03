<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect;
use Session;

use \App\Permissions;
use \App\registerPacient;
use \App\lme;

class lmeController extends Controller
{
    public function show($id)
    {   
        //instancia do model registerPaciente (database)
        $pacient = new registerPacient();
        //instancia do model lme (database)
        $lme = new lme();

        $logged = Auth::user();
        $pacient = registerPacient::find($id);

        //usando a facade DB para escrever as consultas manualmente
        $lme = DB::select('select * from lme where usuario = ?', [$id]);



        if(Permissions::permissaoAdministrador($logged)){
            return view('lme.index', ['lme' => $lme, 'paciente' => $pacient, 'adm' => true]);
        }

        if (Permissions::permissaoModerador($logged)) {
            return view('lme.index', ['lme' => $lme, 'paciente' => $pacient, 'mod' => true]);
        }
   
    }

    
}
