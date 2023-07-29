<?php

use App\DataTables\UsersDataTable;
use App\DataTables\SalesDataTable;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



 
//Route::get('/users', [UsersController::class, 'index'])->name('users.index');

Route::get('users', function(UsersDataTable $dataTable) {
    return $dataTable->render('users.index');
})->name('users.index');

Route::resource('sample', 'SampleController@index');
    Route::post('sample/export', 'SampleController@index');


    
    // RELACIONADO À SALES
Route::get('/sales', function (SalesDataTable $dataTable) {
        return $dataTable->render('sales.index');
    })->name('sales.index');
    use App\Http\Controllers\SaleController;

Route::get('/sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::delete('/sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');
    // RELACIONADO À SALES
