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
use \App\registerDoctor;

class registerDoctorController extends Controller
{
    public function index(Request $request)
    {   
        $logged = Auth::user();

        if (Permissions::permissaoModerador($logged)) {
            $medico = registerDoctor::all();
        } else {
            $medico = registerDoctor::where('medicos', $logged->id)->get();
        }

        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' vizualizou a lista de Medicos'));

        if(Permissions::permissaoAdministrador($logged)){
            return view('registerDoctor.index', ['medicos' => $medico,'adm' => true]);
        }
    }

    public function create()
    {
        return view('registerDoctor.add');
    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $medicos = new registerDoctor();
            
            $medicos->nome = $data['nome']; 
            
            $medicos->crm = $data['crm'];

            $medicos->cns = $data['cns'];
            


            $medicos->save();

            Session::flash('flash_success', "Medico cadastrado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou um Medico: ' . $medicos->name));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar Medico!");
        }

        return Redirect::to('/registerDoctor');
    }

    public function show($id)
    {
        $medicos = registerDoctor::find($id);

        return view('registerDoctor.show', [
            'medicos' => $medicos, 
        ]);
    }

    public function edit($id)
    {
        $medicos = registerDoctor::find($id);

        return view('registerDoctor.edit', [
            'medicos' => $medicos, 
        ]);
    }

    public function generate($id)
    {
        $report = registerDoctor::find($id);

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

            $medicos = registerDoctor::find($request->get('id'));
            
            $medicos->nome = $data['nome'];
            $medicos->crm = $data['crm'];
            $medicos->cns = $data['cns'];
           
            $medicos->save();

            Session::flash('flash_success', "Medico atualizado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' atualizou um Medico: ' . $medicos->name));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar Medico!");
        }

        return Redirect::to('/registerDoctor');
    }

    public function destroy($id)
    {   
        try {
         
            $medicos = registerDoctor::find($id)->delete();

            Session::flash('flash_success', "Medico excluído com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' excluiu o Medico ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir este Medico!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir Medico!");
        }

        return Redirect::to('/registerDoctor');
    }
}
