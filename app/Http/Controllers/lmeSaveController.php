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

class lmeSaveController extends Controller
{
    //show start controller
    public function store(Request $request)//paciente selecionado para criar
    {
        
        $data = $request->all();

        $lme = new lme();        
        
        $lme->usuario = $data['pacient'];//id
        $lme->cid = $data['cid'];
        $lme->medicamento1 = $data['med1'];
        $lme->dosagem1 = $data['dose1'];
        $lme->medicamento2 = "null";
        $lme->dosagem2 = "null";
        if(isset($data['med2'])){
            $lme->medicamento2 = $data['med2'];
            $lme->dosagem2 = $data['dose2'];
        }
        $lme->medico = $data['resp'];
        $lme->posologia = null;
        $lme->quantidade = null;  
        $lme->inicial = $data['inicio'];
        $lme->final = $data['fim'];
        $lme->status = "Ativo";
        $lme->created_at = "2020-10-03 07:30:03";
        $lme->updated_at = "2020-10-03 07:30:03";


        $lme->save();
        /*
        DB::insert('insert into lme (usuario, cid, medicamento1, dosagem1, medicamento2, dosagem2, medico, posologia, quantidade, inicial, final, status, created_at, updated_at)
         values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$lme->usuario, $lme->cid, $lme->medicamento1, $lme->dosagem1, $lme->medicamento2, $lme->dosagem2, $lme->nome, "null", "null", $lme->inicial, $lme->final, 'Ativo', '2020-10-03 07:30:03', '2020-10-03 07:30:03']);
        */

        Session::flash('flash_success', "LME inserida com sucesso!");

        return redirect()->back();
        

        
            


        


 
        
   
    }
}
