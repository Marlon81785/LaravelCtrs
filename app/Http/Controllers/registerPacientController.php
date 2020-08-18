<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Redirect;
use Session;
use PDF;

use \App\Logs;
use \App\Permissions;
use \App\registerPacient;

class registerPacientController extends Controller
{
    public function index(Request $request)
    {  
    
        $logged = Auth::user();

        if (Permissions::permissaoModerador($logged)) {
            $pacient = registerPacient::all();
        } else {
            //$pacient = registerPacient::where('pacient', $logged->id)->get();
            $pacient = registerPacient::all();
        }

        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' vizualizou a lista de Pacientes'));

        if(Permissions::permissaoAdministrador($logged)){
            return view('registerPacient.index', ['pacient' => $pacient,'adm' => true]);
        }

        return view('registerPacient.index', ['pacient' => $pacient]);
        
        
        
    }

    public function create(){

        return view('registerPacient.add');

    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $pacient = new registerPacient();
            
            $pacient->nomePaciente = $data['nomePaciente']; 
            
            $pacient->nomeMaePaciente = $data['nomeMaePaciente'];

            $pacient->tratamento = $data['tratamento'];

            $pacient->cpf = $data['cpf'];

            $pacient->cns = $data['cns'];

            $pacient->dataNasc = $data['dataNasc'];
            

            //$pacient->pacient = Auth::user()->id;
            //banco pacient -> coluna pacient


            $pacient->save();

            Session::flash('flash_success', "Paciente cadastrado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou um Paciente: ' . $pacient->nomePaciente));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar Paciente!");
        }

        return Redirect::to('/registerPacient');
    }

    public function show($id)
    {
        $pacient = registerPacient::find($id);
        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerPacient.show', ['pacient' => $pacient,'adm' => true]);
        }
        if(Permissions::permissaoModerador($logged)){
            return view('registerPacient.add', ['pacient' => $pacient,'mod' => true]);
        }
        
    }

    public function edit($id)
    {
        $logged = Auth::user();
        $pacient = registerPacient::find($id);
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerPacient.edit', ['pacient' => $pacient,'adm' => true]);
        }
        if(Permissions::permissaoModerador($logged)){
            return view('registerPacient.add', ['pacient' => $pacient,'mod' => true]);
        }
        
    }

    public function generate($id)
    {
        $report = registerPacient::find($id);

        $query = DB::select($report->query);

        $data = [
            'report' => $report,
            'query' => $query,
            'columns' => array_keys((array)$query[0]),
        ];

        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $pdf = PDF::loadView('pdf', $data)->setPaper('a4', 'landscape');

        return $pdf->download( $report->name . '.pdf' );
    }

    public function update(Request $request)
    {   
        try {

            $data = $request->all();

            $pacient = registerPacient::find($request->get('id'));
            
            $pacient->nomePaciente = $data['nomePaciente']; 
            
            $pacient->nomeMaePaciente = $data['nomeMaePaciente'];

            $pacient->tratamento = $data['tratamento'];

            $pacient->cpf = $data['cpf'];

            $pacient->cns = $data['cns'];

            $pacient->dataNasc = $data['dataNasc'];
           

    
            $pacient->save();

            Session::flash('flash_success', "PacientePaciente atualizado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' atualizou um Paciente: ' . $pacient->name));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar Paciente!");
        }

        return Redirect::to('/registerPacient');
    }

    public function destroy($id)
    {   
        try {
         
            $pacient = registerPacient::find($id)->delete();

            Session::flash('flash_success', "Paciente excluído com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' excluiu o Paciente ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir este Paciente!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir Paciente!");
        }

        return Redirect::to('/registerPacient');
    }
}
