<?php
/*
| add(routes): api
| refactor(routes): api
| rm(routes): api
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;



Route::prefix('v1')->group(function () {
    Route::group(['middleware' => 'api'], function () {
        // essas rotas podem acessar a aplicação sem precisar de autenti
        // Route::resource('post', 'PNA\BlogController')->except(['create', 'update', 'store', 'edit']);
    });
});