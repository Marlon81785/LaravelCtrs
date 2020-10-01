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
use \App\registerDrugs;

class registerDrugsController extends Controller
{
    public function index(Request $request)
    {   
        $logged = Auth::user();

        if (Permissions::permissaoModerador($logged)) {
            $medicamentos = registerDrugs::all();
        } else {
            $medicamentos = registerDrugs::where('cid', $logged->id)->get();
        }

        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' vizualizou a lista de Medicamentos'));

        if(Permissions::permissaoAdministrador($logged)){
            return view('registerDrugs.index', ['medicamentos' => $medicamentos,'adm' => true]);
        }

        return view('registerDrugs.index', ['medicamentos' => $medicamentos]);
    }

    public function create()
    {

        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerDrugs.add', ['adm' => true]);
        }
        
        if (Permissions::permissaoModerador($logged)) {
            return view('registerDrugs.add', ['mod' => true]);
        }

    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $medicamentos = new registerDrugs();
            
            $medicamentos->categoria = $data['categoria']; 
            
            $medicamentos->medicamento = $data['medicamento'];

            $medicamentos->aplicacao1 = $data['aplicacao1'];

            $medicamentos->aplicacao2 = $data['aplicacao2'];
            

            //$medicamentos->medicamentos = Auth::user()->id;
            //banco medicamentos -> coluna medicamentos


            $medicamentos->save();

            Session::flash('flash_success', "Medicamento cadastrado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou um Medicamento: ' . $medicamentos->medicamento));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar Medicamento!");
        }

        return Redirect::to('/registerDrugs');
    }

    public function show($id)
    {
        $medicamentos = registerDrugs::find($id);

        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerDrugs.show', ['medicamentos' => $medicamentos, 'adm' => true]);
        }
        
        if (Permissions::permissaoModerador($logged)) {
            return view('registerDrugs.show', ['medicamentos' => $medicamentos, 'mod' => true]);
        }

    }

    public function edit($id)
    {
        $medicamentos = registerDrugs::find($id);

        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerDrugs.edit', ['medicamentos' => $medicamentos, 'adm' => true]);
        }
        
        if (Permissions::permissaoModerador($logged)) {
            return view('registerDrugs.edit', ['medicamentos' => $medicamentos, 'mod' => true]);
        }


    }

    public function generate($id)
    {
        $report = registerDrugs::find($id);

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

            $medicamentos = registerDrugs::find($request->get('id'));
            
            $medicamentos->categoria = $data['categoria'];
            $medicamentos->medicamento = $data['medicamento'];

            $medicamentos->aplicacao1 = $data['aplicacao1'];
            $medicamentos->aplicacao2 = $data['aplicacao2'];
           

    
            $medicamentos->save();

            Session::flash('flash_success', "Medicamento atualizado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' atualizou um Medicamento: ' . $medicamentos->medicamento));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar Medicamento!");
        }

        return Redirect::to('/registerDrugs');
    }

    public function destroy($id)
    {   
        try {
         
            $medicamentos = registerDrugs::find($id)->delete();

            Session::flash('flash_success', "Medicamento excluído com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' excluiu o Medicamento ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir este Medicamento!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir Medicamento!");
        }

        return Redirect::to('/registerDrugs');
    }
}
