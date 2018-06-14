<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treinamento;
class TreinamentoController extends Controller
{
     public function create()
    {
        return view('createtreinamento');
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
    	$treinamento = new Treinamento();
        if($request->hasfile('objetivo') && $request->file('objetivo')->isValid()){
            $extension = $request->objetivo->extension();
            $nameFile = "{$request->nome}.{$extension}";
            $upload = $request->objetivo->storeAs('public', $nameFile);
        }
        $treinamento->nometreinamento = $request->get('nome');
        $treinamento->cargahoraria = $request->get('cargahoraria');
        $treinamento->objetivo = $request->file('objetivo');
        $treinamento->realizador = $request->get('realizador');	
        $treinamento->save();

        return redirect('treinamento')->with('success', 'Information has been added'); 
    }
    public function index()
    {
        $treinamentos=Treinamento::all();
        return view('indextreinamento',compact('treinamentos'));
    }
     public function edit($id)
    {
        $treinamento = Treinamento::find($id);
        return view('edittreinamento',compact('treinamento','id'));
    }
    public function update(Request $request, $id)
    {
        $treinamento= Treinamento::find($id);
        $treinamento->nometreinamento = $request->get('nome');
        $treinamento->cargahoraria = $request->get('cargahoraria');
        $treinamento->objetivo = $request->get('objetivo');
        $treinamento->realizador = $request->get('realizador');	
        $treinamento->save();
        return redirect('treinamento');
    }
    public function destroy($id)
    {
        $treinamento = Treinamento::find($id);
        $treinamento->delete();
        return redirect('treinamento')->with('success','Information has been  deleted');
    }

    public function verTreinamento($id){
        $treinamento = Treinamento::find($id);
        return view('treinamentopage',compact('treinamento'));
    }
}
