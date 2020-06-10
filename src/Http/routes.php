<?php

use EugMerkeleon\Support\AutoDoc\Http\Controllers\AutoDocController;


Route::get(config('auto-doc.route.documentation'), ['uses' => AutoDocController::class . '@documentation']);
Route::get('/auto-doc/{file}', ['uses' => AutoDocController::class . '@getFile']);
Route::get(config('auto-doc.route.index'), ['uses' => AutoDocController::class . '@index']);
