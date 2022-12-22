<?php
/*
| add(routes): api
| refactor(routes): api
| rm(routes): api
*/

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DogController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\ServicoController;
use GuzzleHttp\Psr7\Request;


// Route::group(['middleware' => ['auth:sanctum']], function () {

//     Route::apiResources([
//         '/dog' => DogController::class,
//         '/tarefa' => TarefaController::class,
//         '/servico' => ServicoController::class,
//     ]);
// });

// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);





// Route::post('/register', [AuthController::class, 'register']);
// Route::middleware('auth:sanctum')->get(
//     '/user',
//     function (Request $request) {
//         return $request->User();
//     }
// );

Route::prefix('v1')->group(function () {
    Route::group(['middleware' => 'api'], function () {
        // essas rotas podem acessar a aplicação sem precisar de autenti
        // Route::resource('post', 'PNA\BlogController')->except(['create', 'update', 'store', 'edit']);
        Route::resource('/dog', DogController::class)->except(['create', 'edit']);
        Route::resource('/tarefa', TarefaController::class)->except(['create', 'edit']);
        Route::resource('/servico', ServicoController::class)->except(['create', 'edit']);
    });
});