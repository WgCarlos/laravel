<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class loginController extends Controller
{
    public function index()
    {

        return view('login.index');
    }

    public function pass(Request $req)
    {

        $dados = $req->all();
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])) {
            return redirect()->route('admin.cursos');
        }
        return redirect()->route('site.login');
    }

    public function exit()
    {

        Auth::logout();
        return redirect()->route('site.home');
    }
}
