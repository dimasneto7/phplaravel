<?php

namespace App\Http\Controllers;

use App\Classes\Enc;
use App\Classes\Logger;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class Main extends Controller
{
    private $Enc;
    private $Logger;

    public function __construct(){
        $this->Enc = new Enc();
        $this->Logger = new Logger();
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

        // verificar dados de login
        $usuario = trim($request->input('text_usuario'));
        $senha = trim($request->input('text_senha'));

        $usuario = Usuario::where('usuario', $usuario)->first();

        // verifica se existe o usuario
        if(!$usuario){

            // Logger
            $this->Logger->log('error', trim($request->input('text_usuario')) . ' - Não existe o usuário indicado.');

            session()->flash('erro', ['Não existe o usuário.']);
            return redirect()->route('login');

            return;
        }

        // verificar se a senha está correta
        if(!Hash::check($senha, $usuario->senha)){

            // Logger
            $this->Logger->log('error', trim($request->input('text_usuario')) . ' - Senha inválida');

            session()->flash('erro', ['Senha inválida']);
            return redirect()->route('login');
        }

        // login é válido
        session()->put('usuario', $usuario);

        // logger
        $this->Logger->log('info', 'Fez o seu login');

        return redirect()->route('index');
    }

    public function logout(){

        // logger
        $this->Logger->log('info', 'Fez o seu logout.');

        session()->forget('usuario');
        return redirect()->route('index');
    }

    // Home - entrada na aplicação
    public function home(){
        if(!$this->checkSession()){
            return redirect()->route('login');
        }

        $data = [
            'usuarios' => Usuario::all()
        ];

        return view('home', $data);
    }

    public function edit($id_usuario){

        $id_usuario = $this->Enc->desencriptar($id_usuario);

        echo 'O usuário a editar é ' . $id_usuario;
    }

    public function upload(Request $request){

        // validação do upload
        $validate = $request->validate(
            // rules
            [
                'ficheiro' => 'required|image|mimes:png|max:100|dimensions:min_width=100,min_height=100,max_width=1000,max_height=500'
            ],
            // error messages
            [
                'ficheiro.required' => 'A imagem é obrogatória',
                'ficheiro.image' => 'Deve carregar uma imagem',
                'ficheiro.mimes' => 'A imagem tem que ser em formato png',
                'ficheiro.max' => 'No máximo com 12 kb',
                'ficheito.dimensions' => 'Dimensões inválidas'
            ]
        );

        // $request->ficheiro->store('public/imagens');
        echo 'terminado';
    }
}

// user@gmail.com / abc123
// admin@gmail.com / aaabbb
