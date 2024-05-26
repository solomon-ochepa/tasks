<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\App\Http\Controllers\ProjectController;

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::resource('projects', ProjectController::class)->names('project');
});
