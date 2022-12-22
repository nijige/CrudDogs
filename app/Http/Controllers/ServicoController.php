<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{

    public function index()
    {
        return Servico::all();
    }


    public function store(Request $request)
    {
        if (Servico::create($request->all())) {

            return response()->json([
                'message' => 'cadastrado com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar.'
        ], 404);
    }


    public function show($servico)
    {
        $servico = Servico::find($servico);
        if ($servico) {
            return $servico;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar tarefa.'
        ], 404);
    }


    public function update(Request $request, $id)
    {

        $servico = Servico::find($id);
        if ($servico) {
            $servico->update($request->all());
            return $servico;
        }
        return response()->json([
            'message' => 'Erro ao atualizar a tarefa.'
        ], 404);
    }



    public function destroy($servico)
    {
        $servico = Servico::find($servico);
        if (!$servico) {
            return response()->json([
                'mensagem' => "o registro não existe"
            ], 404);
        }
        $servico =  Servico::destroy($servico);
        return response()->json([
            'mensagem' => "registro excluído"
        ], 201);
    }
}
