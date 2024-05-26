<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\App\Http\Controllers\TaskController;
use Modules\Task\App\Livewire\Index;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tasks', TaskController::class)->except(['index'])->names('task');
    Route::get('tasks', Index::class)->name('task.index');
});
