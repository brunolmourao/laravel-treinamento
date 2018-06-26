<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use App\Modulo;
use App\Treinamento;
use App\Professor;

class ModuloController extends Controller
{
    public function create()
    {
        $treinamentos  = Treinamento::all();
        return view('createmodulo',compact('treinamentos'));
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'nomemodulo' => 'required|alpha_num',
            'ementa' => 'required|mimes:pdf',
            'sumario' => 'required|string',
            'cargahoraria' => 'required|numeric',
        ]);
        $modulo = new Modulo();
        if(!(Treinamento::where('nometreinamento',$request->treinamento)->get()->isEmpty())){
        	$treinamento = Treinamento::where('nometreinamento',$request->treinamento)->first();
            $modulo->nomemodulo = $request->get('nomemodulo');
            $modulo->sumario = $request->get('sumario');
            //$modulo->ementa = $request->file('ementa');
            $modulo->idtreinamento = $treinamento->idtreinamento;
            if($request->hasfile('ementa') && $request->file('ementa')->isValid()){
                $ementa = $request->ementa;
                $nameFile = time() . '.' . $ementa->getClientOriginalExtension();
                $upload = $request->ementa->storeAs('public', $nameFile);
                $modulo->ementa = $nameFile;
            }
            $modulo->cargahoraria = $request->get('cargahoraria');	
            $modulo->save();
            return redirect('modulo')->with('success', 'Information has been added');      	
        }else{
        	return redirect('modulo')->with('failure', 'Information has not been added');
        }
    
        
    }
    public function index()
    {
        $modulos=Modulo::all();
        return view('indexmodulo',compact('modulos'));
    }
     public function edit($id)
    {
        $modulo = Modulo::find($id);
        return view('editmodulo',compact('modulo','id'));
    }
    public function update(Request $request, $id)
    {
        $modulo= Modulo::find($id);
       // $treinamento = Treinamento::where('idtreinamento',$modulo->idtreinamento)->first();
        if($request->hasfile('ementa') && $request->file('ementa')->isValid()){
            $filepath = "storage/".$modulo->ementa;
            if (File::exists($filepath)) {
                unlink($filepath);
            }
            $extension = $request->ementa->extension();
            $nameFile = "{$modulo->nomemodulo}.{$modulo->idtreinamento}.{$extension}";
            $upload = $request->ementa->storeAs('public', $nameFile);
            $modulo->ementa = $nameFile;
        }
        $modulo->sumario = $request->get('sumario');
        $modulo->cargahoraria = $request->get('cargahoraria');
        $modulo->save();
        return redirect('modulo')->with('success','Modulo Editado com Sucesso');
    }
    public function destroy($id)
    {
        $modulo = Modulo::find($id);
        $professores = Professor::where('idmodulo',$modulo->idmodulo)->get();
        foreach ($professores as $key) {
            $key->delete();
        }
        $filepath = "storage/".$modulo->nomemodulo.".".$modulo->idtreinamento.".pdf";
        if (File::exists($filepath)) {
            unlink($filepath);
        }
        $modulo->delete();   
        return redirect('modulo')->with('success','Information has been  deleted');
       
    }

    public function verModulo($id){
        $modulo = Modulo::find($id);

        return view('modulopage',compact('modulo'));
    }
}
