<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    Route::get('admin/employees', [EmployeeController::class, 'index'])->name('admin/employees');

    Route::get('admin/employees/create', [EmployeeController::class, 'create'])->name('admin/employees/create');

    Route::post('admin/employees/save', [EmployeeController::class, 'save'])->name('admin/employees/save');
    
    Route::get('admin/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('admin/employees/edit');

    Route::put('admin/employees/edit/{id}', [EmployeeController::class, 'update'])->name('admin/employees/update');

    Route::get('/admin/employees/delete/{id}', [EmployeeController::class, 'delete'])->name('admin/employees/delete');

    Route::get('admin/employees/show/{id}', [EmployeeController::class, 'show'])->name('admin/employees/show');

   
    
   
    


});
require __DIR__.'/auth.php';


