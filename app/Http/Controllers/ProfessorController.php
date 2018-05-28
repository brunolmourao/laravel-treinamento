<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Modulo;
use App\Professor;

class ProfessorController extends Controller
{
    public function create()
    {
        return view('createprofessor');
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
    	$professor = new Professor();
        if(!(Pessoa::where('matpessoas',$request->matricula)->get()->isEmpty())){
        	$pessoa = Pessoa::where('matpessoas',$request->matricula)->first();
        	if(!(Modulo::where('nomemodulo',$request->nomemodulo)->get()->isEmpty() )){
                $modulo = Modulo::where('nomemodulo',$request->nomemodulo)->first();
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
}
