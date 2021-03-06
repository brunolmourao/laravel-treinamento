<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Treinamento;
use App\Modulo;
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
        $request->validate([
            'nome' => 'required|alpha_num',
            'objetivo' => 'required|mimes:pdf',
            'realizador' => 'required|string',
            'cargahoraria' => 'required|numeric',
        ]);
    	$treinamento = new Treinamento();
        if($request->hasfile('objetivo') && $request->file('objetivo')->isValid()){
            $objetivo = $request->objetivo;
            $nameFile = time() . '.' . $objetivo->getClientOriginalExtension();
            $upload = $request->objetivo->storeAs('public', $nameFile);
            $treinamento->objetivo = $nameFile;
        }
        $treinamento->nometreinamento = $request->get('nome');
        $treinamento->cargahoraria = $request->get('cargahoraria');
        //$treinamento->objetivo = $request->file('objetivo');
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
       // $treinamento->nometreinamento = $request->get('nome');
        $treinamento->cargahoraria = $request->get('cargahoraria');
        //$treinamento->objetivo = $request->get('objetivo');
        $treinamento->realizador = $request->get('realizador');	
        $treinamento->save();
        return redirect('treinamento');
    }
    public function destroy($id)
    {
        $treinamento = Treinamento::find($id);
        $modulos = Modulo::where('idtreinamento',$treinamento->idtreinamento)->get();
        foreach ($modulos as $key) {
            $key->delete();
        }
        $filepath = "storage/".$treinamento->nometreinamento.".pdf";
        if (File::exists($filepath)) {
            unlink($filepath);
        }    
        $treinamento->delete();
        return redirect('treinamento')->with('success','Information has been  deleted');
    }

    public function verTreinamento($id){
        $treinamento = Treinamento::find($id);
        return view('treinamentopage',compact('treinamento'));
    }
}
