<?php

use App\Http\Controllers\Todo\TodoController;
use App\Http\Controllers\Todo\TodoPriorityController;
use Illuminate\Support\Facades\Route;



Route::get('/todo', [TodoController::class, 'index'])->name('todo');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.post');
Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.delete');

Route::get('/todopry', [TodoPriorityController::class, 'index'])->name('todopry');
Route::post('/todopry', [TodoPriorityController::class, 'store'])->name('todopry.post');
Route::put('/todopry/{id}', [TodoPriorityController::class, 'update'])->name('todopry.update');
Route::delete('/todopry/{id}', [TodoPriorityController::class, 'destroy'])->name('todopry.delete');


Route::get('/tasks_by_category/{id}', [TodoController::class, 'tasksByCategory'])->name('tasks.by.category');
Route::get('/taskspry_by_category/{id}', [TodoPriorityController::class, 'tasksPryByCategory'])->name('taskspry.by.category');


Route::get('/', function () {
    return view('home');
});





