<?php

namespace App\Http\Controllers;

use App\TurmaRequest;
use App\Pessoa;
use App\Turma;
use Illuminate\Http\Request;

class TurmaRequestController extends Controller
{
   public function create()
    {
        return view('createrequest');
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
        $turmaRequest = new TurmaRequest();
        if(!(Pessoa::where('matpessoas',$request->matricula)->get()->isEmpty())){
            $pessoa = Pessoa::where('matpessoas',$request->matricula)->first();
            if(!(Turma::where('turma',$request->turma)->get()->isEmpty() )){
                $turma = Turma::where('turma',$request->turma)->first();
                $turmaRequest->idpessoas=$pessoa->idpessoas;
                $turmaRequest->idturma=$turma->idturma;
                $turmaRequest->save();
            }
            return redirect('/turma')->with('success', 'Requisiçõa de matrícula feita com sucesso');
        }else{
            return redirect('/turma')->with('failure', 'Information has not been added');
        }
    
        
    }
    public function index()
    {
        $turmaRequest=TurmaRequest::all();
        return view('indexrequest',compact('turmaRequest'));
    }
    public function destroy($id)
    {
        $turmaRequest = TurmaRequest::find($id);
        $turmaRequest->delete();
        return redirect('turmaRequest')->with('success','Information has been  deleted');
    }
}
