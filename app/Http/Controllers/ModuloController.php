<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;
use App\Treinamento;

class ModuloController extends Controller
{
    public function create()
    {
        return view('createmodulo');
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
    	$modulo = new Modulo();
        if(!(Treinamento::where('nometreinamento',$request->nometreinamento)->get()->isEmpty())){
        	$treinamento = Treinamento::where('nometreinamento',$request->nometreinamento)->first();
            $modulo->nomemodulo = $request->get('nomemodulo');
            $modulo->sumario = $request->get('sumario');
            $modulo->ementa = $request->get('ementa');
            $modulo->idtreinamento = $treinamento->idtreinamento;
            $modulo->instrutor = $request->get('instrutor');
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
        $modulo->nomemodulo = $request->get('nomemodulo');
        $modulo->sumario = $request->get('sumario');
        $modulo->ementa = $request->get('ementa');
        $modulo->instrutor = $request->get('instrutor');
        $modulo->cargahoraria = $request->get('cargahoraria');
        $modulo->save();
        return redirect('modulo');
    }
    public function destroy($id)
    {
        $modulo = Modulo::find($id);
        $modulo->delete();
        return redirect('modulo')->with('success','Information has been  deleted');
    }

    public function verModulo($id){
        $modulo = Modulo::find($id);

        return view('modulopage',compact('modulo'));
    }
}
