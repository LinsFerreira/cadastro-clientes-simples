<?php

namespace App\Http\Controllers;

use App\Models\Usuario as ModelsUsuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function index() {

        $usuarios = ModelsUsuario::get();
  
        return view('usuarios.list', ['usuarios' => $usuarios]); // retorna a view list.blade.php que está na pasta view/usuarios.
    }
    // Form onde serão digitados os novos usuários.
    public function new() {
        return view('usuarios.form');
    }

    // Recebe todos os dados preenchidos no formulário de cadastro
    public function add( Request $request) {

      $result = ModelsUsuario::create([
          'name' => $request->nome,
          'email' => $request->email
      ]);
      if (!$result) {
          return redirect()->route('usuarios.index')->with('error', 'Erro na gravação do registro!');
      }
      return redirect()->route('usuarios.index')->with('status', 'Registro Inserido com Sucesso!');
      
    }

    public function edit( $id ) 
    {
        if (!$resultado = ModelsUsuario::find($id) ) {
            return redirect()->back();
        }
 
        return view('usuarios.edit', compact('resultado') );
    }

    public function update( Request $request, $id ) 
    {

        if (!$resultado = ModelsUsuario::find($id) ) {
            return redirect()->back();
        }
  
        ModelsUsuario::where('id', $id)->update([
            'name' => $request->nome,
            'email' => $request->email
        ]);
        return redirect()->route('usuarios.index')->with('status', 'Registro Alterado com Sucesso!');
    }

    public function deletar( $id )
    {
        if (!$resultado = ModelsUsuario::find($id)->delete()) {
            return redirect()->back();
        }
        
       return redirect()->route('usuarios.index')->with('status', 'Registro Deletado com Sucesso!');
    }
 
}
