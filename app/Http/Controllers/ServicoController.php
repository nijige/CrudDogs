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
        return Servico::create($request->all());
    }


    public function show($id)
    {
        return Servico::find($id);
    }


    public function update(Request $request, $id)
    {

        $servico = Servico::findOrFail($id);
        $servico->update($request->all());
        return $servico;
    }



    public function destroy($id)
    {
        return Servico::destroy($id);
    }
}