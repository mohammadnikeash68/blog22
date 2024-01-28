<?php

use App\Http\Controllers\Admin\AdminControllerDashboard;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------

*/

Route::prefix('admin')->namespace('Admin')->group(function (){
    Route::get('/', [AdminControllerDashboard::class,'index'])->name('admin.index');
    Route::prefix('category')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::get('/update/{category}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::get('/destroy/{category}',[CategoryController::class,'destroy'])->name('admin.category.destroy');

    });
});
