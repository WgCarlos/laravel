<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $dados = [
           'name'=>"Carlos",
           'email'=>"carlos@laravel.com.br",
           'password'=>bcrypt("9796"),
       ];
       if(User::where('email','=',$dados['email'])->count()){
           $usuario = User::where('email','=',$dados['email'])->first();
           $usuario->update($dados);
           echo "Usuario alterado";
       }else
            User::create($dados);
            echo "Usuario Criado";
    }
}
