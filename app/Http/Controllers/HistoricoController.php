<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historico;
use App\Pessoa;
use App\Turma;
use DB;

class HistoricoController extends Controller
{
    public function create()
    {
        return view('createhistorico');
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
    	$historico = new Historico();
        if(!(Pessoa::where('matpessoas',$request->matricula)->get()->isEmpty())){
        	$pessoa = Pessoa::where('matpessoas',$request->matricula)->first();
        	if(!(Turma::where('turma',$request->turma)->get()->isEmpty() )){
                $turma = Turma::where('turma',$request->turma)->first();
                $historico->faltas=$request->get('faltas');
                $historico->nota=$request->get('nota');
                $historico->aprovado=$request->get('aprovado');
                $historico->idpessoas=$pessoa->idpessoas;
                $historico->idturma=$turma->idturma;
                $historico->terminada= '0';
                $historico->save();
            }
        	return redirect('historico')->with('success', 'Information has been added');
        }else{
        	return redirect('historico')->with('failure', 'Information has not been added');
        }
    
        
    }
    public function index()
    {
        $historicos=Historico::all();
        return view('indexhistorico',compact('historicos'));
    }
     public function edit($id)
    {
        $historico = Historico::find($id);
        return view('edithistorico',compact('historico','id'));
    }
    public function update(Request $request, $id)
    {
        $historico= Historico::find($id);
        $turma = Turma::where('idturma',$historico->idturma)->first();
        $hoje = date("Y-m-d");
        if(strtotime($turma->datefim) < $hoje){
            $historico->terminada = '1';
        }
        $historico->faltas=$request->get('faltas');
        $historico->nota=$request->get('nota');
        $historico->aprovado=$request->get('aprovado');
        $historico->save();
        return redirect('historico');
    }
    public function destroy($id)
    {
        $historico = Historico::find($id);
        $historico->delete();
        return redirect('historico')->with('success','Information has been  deleted');
    }
}
