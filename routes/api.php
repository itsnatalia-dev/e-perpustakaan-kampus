<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuApiController;

// Endpoint CRUD: http://127.0.0.1:8000/api/buku
Route::apiResource('buku', BukuApiController::class);