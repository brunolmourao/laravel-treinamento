<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historico;
use App\Pessoa;
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
        	
        	$historico->faltas=$request->get('faltas');
       		$historico->nota=$request->get('nota');
        	$historico->aprovado=$request->get('aprovado');
        	$historico->idpessoas=$pessoa->idpessoas;
        	$historico->idturma=$request->get('idturma');
        	$historico->save();
        	return redirect('historico')->with('success', 'Information has been added');
        }else{
        	return redirect('historico')->with('failure', 'Information has not been added');
        }
    
        
    }
    public function index()
    {
        $historico=Historico::all();
        return view('indexhistorico',compact('historico'));
    }
     public function edit($id)
    {
        $historico = Historico::find($id);
        return view('edithistorico',compact('historico','id'));
    }
    public function update(Request $request, $id)
    {
        $historico= Historico::find($id);
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
