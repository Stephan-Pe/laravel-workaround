<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandsController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "This is the Homepage";
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', [ContactController::class, 'index'])->name('con');

// Category Controller
// GET
Route::get('/category/all',  [CategoryController::class, 'AllCat'])->name('all.category');

// POST
Route::post('/category/add',  [CategoryController::class, 'AddCat'])->name('store.category');

// EDIT
Route::get('/category/edit/{id}',  [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}',  [CategoryController::class, 'Update']);
// softdelete
Route::get('softdelete/category/{id}',  [CategoryController::class, 'SoftDelete']);
// restore
Route::get('category/restore/{id}',  [CategoryController::class, 'Restore']);
// destroy
Route::get('destroy/category/{id}',  [CategoryController::class, 'Destroy']);

// Brands routes
Route::get('/brands/all',  [BrandsController::class, 'AllBrand'])->name('all.brands');
// POST
Route::post('/brands/add',  [BrandsController::class, 'StoreBrand'])->name('store.brand');
// EDIT
Route::get('/brands/edit/{id}',  [BrandsController::class, 'Edit']);
Route::post('/brands/update/{id}',  [BrandsController::class, 'Update']);
// delete
Route::get('/brands/delete/{id}',  [BrandsController::class, 'Delete']);

// Multi Image Route
Route::get('/multi/image',  [BrandsController::class, 'Multipic'])->name('multi.image');
// POST
Route::post('/multi/add',  [BrandsController::class, 'StoreImage'])->name('store.image');

// dashboard routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
