<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();

        //RECUPERA TODOS OS PARAMS DE UMA SÓ VEZ
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";

        //RECUPERA UM PARAM POR VEZ INFORMADO
        // echo $request->input('nome');
        // echo "<br>";
        // echo $request->input('mensagem');
        // echo "<br>";

        //$contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        // print_r($contato->getAttributes());

        // $contato->fill($request->all());
        // $contato->save();

        //$contato->create($request->all());

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedbacks = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O e-mail informado é inválido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',

            'required' => 'O campo :attribute precisa ser preenchido',
        ];

        //Realizar a validação dos dados do formulário recebidos no Request
        $request->validate($regras, );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
