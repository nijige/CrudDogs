<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        // return Tarefa::get();
        $tarefas = Tarefa::all();
        return response()->json([
            'concluido' => booleanValue(),
            'tarefas' => $tarefas

        ]);
    }

    public function store(Request $request)
    {
        $data = $tarefa = new Tarefa;
        $tarefa->descricao = $request->descricao;
        $tarefa->concluido = $request->boolean();
        // $data = $request->input();
        // $tarefa = Tarefa::create([
        //     'descricao' =>  $data['descricao'],
        //     'concluido' => $data[true]

        // ]);
        // return $tarefa;
        return $tarefa;
    }

    // $data = $request->input();
    // return  $data['raca'];
    // $dog = Dog::create([
    //     'nome' =>  $data['nome'],
    //     'raca' =>  $data['raca']

    // ]);
    // return $dog;


    // public function show($id)
    // {
    //     return Tarefa::find($id);
    // }


    public function update(Request $request, $id)
    {
        $data = $request->input();
        $tarefa = Tarefa::find($id);
        // $tarefa->concluido = $data['concluido'];
        $tarefa->descricao = $data['descricao'];
        $tarefa->save();
        return $tarefa;
    }


    // public function destroy($id)
    // {
    //     $tarefa = Tarefa::find($id);
    //     if (!$tarefa) {
    //         return  [
    //             'mensagem' => "o registro não existe"
    //         ];
    //     }
    //     $tarefa->destroy($id);
    //     return  [
    //         'mensagem' => "registro excluído"
    //     ];
    // }
}