<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;

class contatoController extends Controller
{
    public function index(){

    	$contatos = [
            (object)["nome" => "Maria","telefone"=>"9 9765"],
            (object)["nome" => "João","telefone"=>"9 9678"]
    	];

    	$contato = new  Contato();
    	$con = $contato->lista();
    	dd($con->nome);


    	return view('contato.index', compact('contatos'));
    }

    public function criar(request $req){
    	dd($req->all());
    	return "Aqui é o criar do contatoController porra.";
    }

    public function editar(){
    	return "Aqui é o editar do contatoController fdp.";
    }
}
