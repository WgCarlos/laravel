<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class homeController extends Controller
{
    public function index(){
        $cursos = Curso::all();
        return view('home',compact('cursos'));
    }
}
