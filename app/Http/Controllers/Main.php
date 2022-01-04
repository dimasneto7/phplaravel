<?php

namespace App\Http\Controllers;

use App\Classes\Enc;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class Main extends Controller
{
    private $Enc;

    public function __construct(){
        $this->Enc = new Enc();
    }

    public function index() {

        // verifica se o usuário está logado
        if($this->checkSession()){
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    private function checkSession(){
        return session()->has('usuario');
    }

    public function login(){

        // verifica se já existe sessão
        if($this->checkSession()){
            return redirect()->route('index');
        }

        // apresenta o formulário de login
        $erro = session('erro');
        $data = [];
        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ];
        }

        return view('login', $data);
    }

    public function login_submit(LoginRequest $request){

        // verifica se houve submissão de formulário
        if(!$request->isMethod('post')){
            return redirect()->route('index');
        }

        // verifica se já existe sessão
        if($this->checkSession()){
            return redirect()->route('index');
        }

        // houve uma submissão de formulário
        // se existe já um usuário na sessão



        // validação
        $request->validated();

        // verificar dados de login_submit
        $usuario = trim($request->input('text_usuario'));
        $senha = trim($request->input('text_senha'));

        $usuario = Usuario::where('usuario', $usuario)->first();

        // verifica se existe o usuario
        if(!$usuario){
            // usuário não existe
            //    a) registrar um erro (usuário não existe)
            //    b) passar essa informação de forma a ser apresentada no frm login
            //    c) voltar ao formulario de login
            session()->flash('erro', ['Não existe o usuário.']);
            return redirect()->route('login');

            return;
        }

        // verificar se a senha está correta
        if(!Hash::check($senha, $usuario->senha)){
            session()->flash('erro', ['Senha inválida']);
            return redirect()->route('login');
        }

        // login é válido
        session()->put('usuario', $usuario);
        return redirect()->route('index');
    }

    public function logout(){
        session()->forget('usuario');
        return redirect()->route('index');
    }

    // Home - entrada na aplicação
    public function home(){
        if(!$this->checkSession()){
            return redirect()->route('login');
        }

        return view('home');
    }

    public function edit($id_usuario){

        $id_usuario = $this->Enc->encriptar($id_usuario);

        echo "Vou editar os dados do usuário $id_usuario";
    }

    public function final($hash){

        $hash = $this->Enc->desencriptar($hash);
        echo 'valor: ' . $hash;
    }
}

// user@gmail.com / abc123
// admin@gmail.com / aaabbb
