<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Http\Requests\StoreDogRequest;
use App\Http\Requests\UpdateDogRequest;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index()
    {
        return  Dog::get();
    }

    public function store(Request $request)
    {
        if (Dog::create($request->all())) {

            return response()->json([
                'message' => 'cadastrado com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar.'
        ], 404);
    }


    public function show($id)
    {
        $dog =  Dog::find($id);
        if ($dog) {
            return $dog;
        }
        return response()->json([
            'message' => 'Erro ao pesquisar.'
        ], 404);
    }


    public function update(Request $request, $id)
    {
        $dog = Dog::find($id);
        if ($dog) {
            $dog->update($request->all());
            return $dog;
        }
        return response()->json([
            'message' => 'Erro ao atualizar.'
        ], 404);
    }


    public function destroy($id)
    {
        $dog = Dog::find($id);
        if (!$dog) {
            return  [
                'mensagem' => "o registro não existe"
            ];
        }
        $dog->destroy($id);
        return  [
            'mensagem' => "registro excluído"
        ];
    }
}