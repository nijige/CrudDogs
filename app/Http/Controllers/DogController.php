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
        $data = $request->input();
        // return  $data['raca'];
        $dog = Dog::create([
            'nome' =>  $data['nome'],
            'raca' =>  $data['raca']

        ]);
        return $dog;
    }


    public function show($id)
    {
        return Dog::find($id);
    }


    public function update(Request $request, $id)
    {
        $data = $request->input();
        $dog = Dog::find($id);
        $dog->nome = $data['nome'];
        $dog->raca = $data['raca'];
        $dog->save();
        return $dog;
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