<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class cursoController extends Controller
{
    public function index(){
        $registros = Curso::all();
        return view('admin.cursos.index',compact('registros'));
    }

    public function add(){
        return view('admin.cursos.add');
    }

    public function save(request $req){
        $dados = $req->all();

        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }else
            $dados['publicado'] = 'nao';

        if ($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_"."$num.".".$ex";
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        Curso::create($dados);
        return redirect()->route('admin.cursos');
    }

    public function edit($id){
        $registro = Curso::find($id);
        return view('admin.cursos.edit',compact('registro'));

    }

    public function update(request $req, $id){
        $dados = $req->all();

        if(isset($dados['publicado'])){
            $dados['publicado'] = 'sim';
        }else
            $dados['publicado'] = 'nao';

        if ($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_"."$num.".".$ex";
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        Curso::find($id)->update($dados);
        return redirect()->route('admin.cursos');
    }

    public function delete($id){
        Curso::find($id)->delete();
        return redirect()->route('admin.cursos');
    }
}
