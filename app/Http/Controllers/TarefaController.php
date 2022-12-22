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
        return Tarefa::create($request->all());
    }

    public function show($id)
    {
        return Tarefa::find($id);
    }



    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::findOrfail($id);
        $tarefa->update($request->all());
        return $tarefa;
    }




    public function destroy($id)
    {
        return Tarefa::destroy(($id));
        // $tarefa = Tarefa::find($id);
        // if (!$tarefa) {
        //     return  [
        //         'mensagem' => "o registro não existe"
        //     ];
        // }
        // $tarefa->destroy($id);
        // return  [
        //     'mensagem' => "registro excluído"
        // ];
    }
}