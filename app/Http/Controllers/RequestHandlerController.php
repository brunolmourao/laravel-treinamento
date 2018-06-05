<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historico;
use App\TurmaRequest;

class RequestHandlerController extends Controller
{
    public function handleRequest($id){
    	$turmaRequest = TurmaRequest::find($id);
    	$historico = new Historico();
    	 if(!(Pessoa::where('idpessoas',$turmaRequest->idpessoas)->get()->isEmpty())){
        	$pessoa = Pessoa::where('idpessoas',$turmaRequest->idpessoas)->first();
        	if(!(Turma::where('idturma',$turmaRequest->idturma)->get()->isEmpty() )){
                $turma = Turma::where('idturma',$turmaRequest->idturma)->first();
                $historico->faltas='0';
                $historico->nota='0';
                $historico->aprovado='0';
                $historico->idpessoas=$pessoa->idpessoas;
                $historico->idturma=$turma->idturma;
                $historico->terminada= '0';
                $historico->save();
            }
        }    
    	$turmaRequest->delete();
    	return redirect('turmaRequest')->with('success','Aluno Matriculado');
    }
}
