<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Treinamento;
class TurmaController extends Controller
{
    public function create()
    {
        $treinamentos = Treinamento::all(); 
        return view('createturma',compact('treinamentos'));
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|alpha_num',
            'dataInicio' => 'required|after:yesterday',
            'dataFim' => 'required|after:dataInicio',
        ]);
    	$turma = new Turma();
        if(!(Treinamento::where('nometreinamento',$request->treinamento)->get()->isEmpty())){
        	$treinamento = Treinamento::where('nometreinamento',$request->treinamento)->first();
            $turma->turma = $request->get('nome');
            $turma->dateInicio = $request->get('dataInicio');
            $turma->dateFim = $request->get('dataFim');
            $turma->idtreinamento = $treinamento->idtreinamento;	
            $turma->save();
            return redirect('turma')->with('success', 'Information has been added');      	
        }else{
        	return redirect('turma')->with('failure', 'Information has not been added');
        }
    
        
    }
    public function index()
    {
        $turmas=Turma::all();
        return view('indexturma',compact('turmas'));
    }
     public function edit($id)
    {
        $turma = Turma::find($id);
        return view('editturma',compact('turma','id'));
    }
    public function update(Request $request, $id)
    {
        $turma= Turma::find($id);
        $turma->turma = $request->get('nome');
        $turma->dateInicio = $request->get('dataInicio');
        $turma->dateFim = $request->get('dateFim');
        $turma->save();
        return redirect('turma');
    }
    public function destroy($id)
    {
        $turma = Turma::find($id);
        $turma->delete();
        return redirect('turma')->with('success','Information has been  deleted');
    }

    public function verTurma($id){
        $turma = Turma::find($id);

        return view('turmapage',compact('turma'));
    }
}
