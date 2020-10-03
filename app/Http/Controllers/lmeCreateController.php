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

class lmeCreateController extends Controller
{
    //show start controller
    public function show($id)//paciente selecionado para criar
    {   
        //instancia do model registerPaciente (database)
        $pacient = new registerPacient();
        //instancia do model lme (database)
        $lme = new lme();

        $logged = Auth::user();
        $pacient = registerPacient::find($id);

        //usando a facade DB para escrever as consultas manualmente
        $lme = DB::select('select * from lme where usuario = ?', [$id]);
        $medicamentos = DB::select('select * from medicamentos');
        $medicos = DB::select('select * from medicos');
        $cid = DB::select('select * from cid');

        if(Permissions::permissaoAdministrador($logged)){
            return view('lme.create', ['cid' => $cid, 'medicos' => $medicos, 'medicamentos' => $medicamentos ,'lme' => $lme, 'paciente' => $pacient, 'adm' => true]);
        }

        if (Permissions::permissaoModerador($logged)) {
            return view('lme.create', ['cid' => $cid, 'medicos' => $medicos, 'lme' => $lme, 'paciente' => $pacient, 'mod' => true]);
        }
   
    }
}
