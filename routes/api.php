<?php
/*
| add(routes): api
| refactor(routes): api
| rm(routes): api
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DogController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\ServicoController;


Route::prefix('v1')->group(function () {
    Route::group(['middleware' => 'api'], function () {
        // essas rotas podem acessar a aplicação sem precisar de autenti
        // Route::resource('post', 'PNA\BlogController')->except(['create', 'update', 'store', 'edit']);
        Route::resource('/dog', DogController::class)->except(['create', 'edit']);
        Route::resource('/tarefa', TarefaController::class)->except(['create', 'edit']);
        Route::resource('/servico', ServicoController::class)->except(['create', 'edit']);
    });
});