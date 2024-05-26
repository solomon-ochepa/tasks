<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\App\Http\Controllers\TaskController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('task', TaskController::class)->names('task');
});
