<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/question', [HomeController::class, 'question'])->name('front.question');
Route::get('/news', [HomeController::class, 'news'])->name('front.news');
Route::get('/news/{news}', [HomeController::class, 'show'])->name('front.single');
Route::get('/menu', [HomeController::class, 'menu'])->name('front.menu');
Route::get('/sorry', [HomeController::class, 'sorry'])->name('front.sorry');
Route::get('/contact', [HomeController::class, 'contact'])->name('front.contact');
Route::get('/gallery', [HomeController::class, 'galleries'])->name('front.gallery');
Route::get('/menu/{food}', [HomeController::class, 'food'])->name('front.food');
Route::post('/to-telegram', [HomeController::class, 'toTelegram'])->name('front.toTg');
Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::prefix('/dashboard/category')->controller(CategoryController::class)->group(function(){
            Route::get('/index', 'index')->name('admin.category.index');
            Route::get('/create', 'create')->name('admin.category.create');
            Route::get('/edit/{category}', 'edit')->name('admin.category.edit');
            Route::post('/store', 'store')->name('admin.category.store');
            Route::put('/update/{category}', 'update')->name('admin.category.update');
            Route::get('/category/destroy={category}', 'destroy')->name('admin.category.destroy');
        });
        Route::prefix('/dashboard/food')->controller(FoodController::class)->group(function(){
            Route::get('/index', 'index')->name('admin.food.index');
            Route::get('/create', 'create')->name('admin.food.create');
            Route::get('/edit/{food}', 'edit')->name('admin.food.edit');
            Route::post('/store', 'store')->name('admin.food.store');
            Route::put('/update/{food}', 'update')->name('admin.food.update');
            Route::get('/food/destroy={food}', 'destroy')->name('admin.food.destroy');
        });
        Route::prefix('/dasboard')->group(function(){
            Route::resource('question', QuestionController::class);
            Route::resource('news', NewsController::class);
            Route::resource('gallery', GalleryController::class);
            Route::resource('settings', SettingController::class);
            Route::resource('partners', PartnerController::class);
        });
    });

    require __DIR__.'/auth.php';
});
