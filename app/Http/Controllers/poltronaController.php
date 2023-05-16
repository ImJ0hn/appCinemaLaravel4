<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Poltrona;


class poltronaController extends Controller
{

    public function cadastrarPoltrona(Request $request){
        $dadospoltronas = $request->validate(
            [
                'numpol'=> 'int|required',
                'nomeclie'=> 'string|required'
            ]
            );
        Poltrona::create($dadospoltronas);
        return Redirect::route('home');
    }


    // Tenho que criar a página que irá mostrar as poltronas para isto funcionar.
    public function MostrarGerenciadorPoltrona(Request $request){
        $dadospoltronas = Funcionario::all();
       // dd($dadosfuncionarios);

        $dadospoltronas = Funcionario::query();
        $dadospoltronas->when($request->clie,function($query,$nomecliente ){
            $query->where('nomeclie','like','%'.$nomecliente.'%');
        }); 

        $dadospoltronas = $dadospoltronas->get();
        
//ALTERAR ISSO
        return view('gerenciadorFuncionario',['dadosfuncionario'=>$dadosfuncionarios]);
        
    }



    public function ApagarPoltrona(Poltrona $registrosPoltronas){
        $registrosPoltronas->delete();
    
           return Redirect::route('home');
        }


        public function MostrarRegistrosPoltrona(Poltrona $registrosPoltronas){
            return view('xxxx',['registrosPoltronas'=>$registrosPoltronas]);
    
        }


        public function AlterarBancoPoltrona(Poltrona  $registrosPoltronas, Request $request){
            $dadospoltronas = $request->validate([
                'numpol' => 'string|required',
                'nomeclie' => 'string|required'

            ]);
            
        $registrosPoltronas->fill($dadospoltronas);
        $registrosPoltronas->save();

        //Isso terá que ser arrumado depois, quando criar uma route no web.
        return Redirect::route('gerenciar-funcionario');


}



}
?>