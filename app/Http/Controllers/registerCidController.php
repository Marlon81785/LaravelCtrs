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
use \App\registerCid;

class registerCidController extends Controller
{
    public function index(Request $request)
    {   
        $logged = Auth::user();

        if (Permissions::permissaoModerador($logged)) {
            $cid = registerCid::all();
        } else {
            $cid = registerCid::where('cid', $logged->id)->get();
        }

        Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' vizualizou a lista de CIDs'));

        if(Permissions::permissaoAdministrador($logged)){
            return view('registerCid.index', ['cid' => $cid,'adm' => true]);
        }
    }

    public function create()
    {
        return view('registerCid.add');
    }

    public function store(Request $request)
    {  
        try {

            $data = $request->all();

            $cid = new registerCid();
            
            $cid->cid = $data['cid']; 
            
            $cid->desc = $data['desc'];
            

            //$cid->cid = Auth::user()->id;
            //banco cid -> coluna cid


            $cid->save();

            Session::flash('flash_success', "CID cadastrado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' cadastrou um CID: ' . $cid->name));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao cadastrar CID!");
        }

        return Redirect::to('/registerCid');
    }

    public function show($id)
    {
        $cid = registerCid::find($id);

        return view('registerCid.show', [
            'cid' => $cid, 
        ]);
    }

    public function edit($id)
    {
        $cid = registerCid::find($id);

        return view('registerCid.edit', [
            'cid' => $cid, 
        ]);
    }

    public function generate($id)
    {
        $report = registerCid::find($id);

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

            $cid = registerCid::find($request->get('id'));
            
            $cid->cid = $data['cid'];
            $cid->desc = $data['desc'];
           

    
            $cid->save();

            Session::flash('flash_success', "CID atualizado com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' atualizou um CID: ' . $cid->name));

        } catch (Exception $e) {
            Session::flash('flash_error', "Erro ao atualizar CID!");
        }

        return Redirect::to('/registerCid');
    }

    public function destroy($id)
    {   
        try {
         
            $cid = registerCid::find($id)->delete();

            Session::flash('flash_success', "CID excluído com sucesso!");

            Logs::cadastrar(Auth::user()->id, (Auth::user()->name . ' excluiu o CID ID: ' . $id));

        } catch (\Illuminate\Database\QueryException $e) {

            Session::flash('flash_error', 'Não é possível excluir este CID!');

        } catch (Exception $e) {

            Session::flash('flash_error', "Erro ao excluir CID!");
        }

        return Redirect::to('/registerCid');
    }
}
