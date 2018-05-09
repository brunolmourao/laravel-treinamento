<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\User;
use DB;
class PessoasController extends Controller
{
   public function create()
    {
        return view('create');
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
        $pessoa = new Pessoa();
        $pessoa->nomepessoa=$request->get('name');
        $pessoa->email=$request->get('email');
        $pessoa->celular=$request->get('number');
       	$pessoa->whatsapp = $request->get('whatsapp');
       	$pessoa->matpessoas = $request->get('matricula');
        $pessoa->save();
        
        return redirect('pessoa')->with('success', 'Information has been added');
    }
    public function index()
    {
        $pessoas=Pessoa::all();
        return view('index',compact('pessoas'));
    }
     public function edit($id)
    {
        $pessoa = Pessoa::find($id);
        return view('edit',compact('pessoa','id'));
    }
    public function update(Request $request, $id)
    {
        $pessoa= Pessoa::find($id);
       
        
        if(!(User::where('matricula',$pessoa->matpessoas)->get()->isEmpty())){
             $users = User::where('matricula',$pessoa->matpessoas)->get();
            $user = $users[0];
            $user->name=$request->get('name');
            $user->phoneNumber=$request->get('number');
            $user->whatsapp=$request->get('whatsapp');
            $user->save();
        }    
        $pessoa->nomepessoa=$request->get('name');
        $pessoa->celular=$request->get('number');
        $pessoa->whatsapp=$request->get('whatsapp');
       

        $pessoa->save();
        return redirect('pessoa');
    }
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);
        if(!(User::where('matricula',$pessoa->matpessoas)->get()->isEmpty())){
             $users = User::where('matricula',$pessoa->matpessoas)->get();
            $user = $users[0];
            $user->delete();
        }   
        $pessoa->delete();
        return redirect('pessoa')->with('success','Information has been  deleted');
    }
}
