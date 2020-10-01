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
use \App\registerAnaminese;

class registerAnamineseController extends Controller
{
    public function index(Request $request)
    {   
        $logged = Auth::user();

        if (Permissions::permissaoModerador($logged)) {
            $anaminese = registerAnaminese::all();
        } else {
            $anaminese = registerAnaminese::where('anaminese', $logged->id)->get();
        }

        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' vizualizou a lista de Anamineses'));

        if(Permissions::permissaoAdministrador($logged)){
            return view('registerAnaminese.index', ['anaminese' => $anaminese,'adm' => true]);
        }

        return view('registerAnaminese.index', ['anaminese' => $anaminese]);
    }

    public function create()
    {
        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerAnaminese.add', ['adm' => true]);
        }
        
        if (Permissions::permissaoModerador($logged)) {
            return view('registerAnaminese.add', ['mod' => true]);
        }
        
    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $anaminese = new registerAnaminese();
            
            $anaminese->tratamento = $data['tratamento'];
            $anaminese->anaminese = $data['anaminese']; 
            
            
            

            //$cid->cid = Auth::user()->id;
            //banco cid -> coluna cid


            $anaminese->save();

            Session::flash('flash_success', "Anaminese cadastrado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou um Anaminese: ' . $anaminese->anaminese));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar Anaminese!");
        }

        return Redirect::to('/registerAnaminese');
    }

    public function show($id)
    {
        $anaminese = registerAnaminese::find($id);

        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerAnaminese.show', ['anaminese' => $anaminese, 'adm' => true]);
        }
        
        if (Permissions::permissaoModerador($logged)) {
            return view('registerAnaminese.show', ['anaminese' => $anaminese, 'mod' => true]);
        }

    }

    public function edit($id)
    {
        $anaminese = registerAnaminese::find($id);

        $logged = Auth::user();
        if(Permissions::permissaoAdministrador($logged)){
            return view('registerAnaminese.edit', ['anaminese' => $anaminese, 'adm' => true]);
        }
        
        if (Permissions::permissaoModerador($logged)) {
            return view('registerAnaminese.edit', ['anaminese' => $anaminese, 'mod' => true]);
        }

        
    }

    public function generate($id)
    {
        $report = registerAnaminese::find($id);

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

            $anaminese = registerAnaminese::find($request->get('id'));
            
            $anaminese->tratamento  = $data['tratamento'];
            $anaminese->anaminese = $data['anaminese'];
           

    
            $anaminese->save();

            Session::flash('flash_success', "Anaminese atualizado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' atualizou um Anaminese: ' . $anaminese->anaminese));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar Anaminese!");
        }

        return Redirect::to('/registerAnaminese');
    }

    public function destroy($id)
    {   
        try {
         
            $anaminese = registerAnaminese::find($id)->delete();

            Session::flash('flash_success', "Anaminese excluído com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' excluiu o Anaminese ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir este Anaminese!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir Anaminese!");
        }

        return Redirect::to('/registerAnaminese');
    }
}
