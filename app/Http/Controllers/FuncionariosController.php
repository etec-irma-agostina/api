<?php 

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController 
{
    public function index()
    {
        return Funcionario::all();
    }

    public function store(Request $request)
    {
        return response()->json(
            Funcionario::create($request->all()),
            201
        );
        
    }

    public function show(int $id){
        $funcionario = Funcionario::find($id);
        if (is_null($funcionario)) return response()->json('', 204);
        return response()->json($funcionario);
    }

    public function update(int $id, Request $request){
        $funcionario = Funcionario::find($id);
        if (is_null($funcionario)) return response()->json(['erro' => "recurso não encontrado"], 404);
        $funcionario->fill($request->all());
        $funcionario->save();
        return response()->json($funcionario);
    }

    public function destroy(int $id){
        $qtdeRecursosRemovidos = Funcionario::destroy($id);
        if($qtdeRecursosRemovidos === 0) return response()->json(['erro' => "recurso não encontrado"], 404);
        return response()->json('', 204);
    }
}
