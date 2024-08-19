<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

//Fallback declara que qualquer rota que seja inexistente será redirecionado para view
Route::fallback([IrisController::class, 'index']);
//Rota que redireciona para view
Route::get('/', [IrisController::class, 'index']);
//Rota para ter acesso aos dados do banco
Route::get('/iris-data', [IrisController::class, 'getData'])->name('data');
Route::get('/download', [IrisController::class, 'getDataSet'])->name('download');