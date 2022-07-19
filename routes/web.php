<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard',[HomeController::class, 'check'])->name('dashboard');
    Route::get('/addTask',[HomeController::class, 'addtask'])->name('addTask');
    Route::post('task-create',[TaskController::class, 'create']);
    Route::post('edittask',[TaskController::class, 'edittask']);
    Route::post('task-update',[TaskController::class, 'updatetask']);
    Route::post('delete',[TaskController::class, 'delete_task']);
    Route::post('approve',[TaskController::class, 'approve']);
    Route::post('reject',[TaskController::class, 'reject']);

    Route::get('ApprovedView',[TaskController::class, 'approveview'])->name('ApprovedView');
    Route::get('RejectView',[TaskController::class, 'rejectview'])->name('RejectView');


    

    
});
