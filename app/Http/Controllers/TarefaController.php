<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        return Tarefa::all();
    }

    public function store(Request $request)
    {
        if (Tarefa::create($request->all())) {

            return response()->json([
                'message' => 'cadastrado com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar.'
        ], 404);
    }

    public function show($tarefa)
    {
        $tarefa = Tarefa::find($tarefa);
        if ($tarefa) {
            return $tarefa;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar tarefa.'
        ], 404);
    }



    public function update(Request $request, $tarefa)
    {
        $tarefa = Tarefa::find($tarefa);
        if ($tarefa) {
            $tarefa->update($request->all());
            return $tarefa;
        }
        return response()->json([
            'message' => 'Erro ao atualizar a tarefa.'
        ], 404);
    }




    public function destroy($tarefa)
    {
        // return Tarefa::destroy(($id));
        $tarefa = Tarefa::find($tarefa);
        if (!$tarefa) {
            return response()->json([
                'mensagem' => "o registro não existe"
            ], 404);
        }
        $tarefa->destroy($tarefa);
        return response()->json([
            'mensagem' => "registro excluído"
        ], 201);
    }
}