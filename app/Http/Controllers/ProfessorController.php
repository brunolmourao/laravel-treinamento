<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\User;
use App\Modulo;
use App\Professor;
use App\Treinamento;

class ProfessorController extends Controller
{
    public function create()
    {
        $professores = User::select('matricula')->where('usertype','=',1)->orWhere('usertype','=',2)->get();
        $modulos = Modulo::all();
        $treinamentos = Treinamento::all();
        return view('createprofessor',compact('professores','modulos','treinamentos'));
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
        $professor = new Professor();
        if(!(Pessoa::where('matpessoas',$request->matricula)->get()->isEmpty())){
        	$pessoa = Pessoa::where('matpessoas',$request->matricula)->first();
            $treinamento = Treinamento::where('nometreinamento',$request->treinamento)->first();
        	if(!(Modulo::where('nomemodulo',$request->modulo)->where('idtreinamento',$treinamento->idtreinamento)->get()->isEmpty() )){
                $modulo = Modulo::where('nomemodulo',$request->modulo)->where('idtreinamento',$treinamento->idtreinamento)->first();
                $professor->idpessoas=$pessoa->idpessoas;
                $professor->idmodulo=$modulo->idmodulo;
                $professor->save();
            }
        	return redirect('professor')->with('success', 'Information has been added');
        }else{
        	return redirect('professor')->with('failure', 'Information has not been added');
        }
    
        
    }
    public function index()
    {
        $professores=Professor::all();
        return view('indexprofessor',compact('professores'));
    }
    public function destroy($id)
    {
        $professor = Professor::find($id);
        $professor->delete();
        return redirect('professor')->with('success','Information has been  deleted');
    }
    public function verProfessor($id){
        $professor = Professor::find($id);

        return view('professorpage',compact('professor'));
    }
    public function professorList(){
        $professores = User::select('matricula')->where('usertype','=',1)->orWhere('usertype','=',2)->get();
        return view('professorlist',compact('professores'));
    }
}
