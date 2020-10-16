<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProducerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', [HomeController::class, 'index'])->name('userHome');
Route::get('/modal', [HomeController::class, 'modal'])->name('userModalQuickView');
Route::get('san-pham/{name}', [ProductsController::class, 'detail'])->name('userDetailProducts');
Route::get('danh-muc/{name}', [ProductsController::class, 'catalog'])->name('userCatalogProducts');

// Group Backend
Route::group(['prefix' => 'admin'], function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('adminDashboard');
    
    // Catalog
    Route::group(['prefix' => 'catalog'], function () {
        Route::get('/', [CatalogController::class, 'index'])->name('adminCatalogIndex');
        Route::get('/add', [CatalogController::class, 'add'])->name('adminCatalogAdd');
        Route::post('/postAdd', [CatalogController::class, 'postAdd'])->name('adminCatalogPostAdd');
        Route::get('/edit/{id}', [CatalogController::class, 'edit'])->name('adminCatalogEdit');
        Route::post('/postEdit/{id}', [CatalogController::class, 'postEdit'])->name('adminCatalogPostEdit');
        Route::get('/status/{id}', [CatalogController::class, 'status'])->name('adminCatalogStatus');
        Route::get('/trash/{id}', [CatalogController::class, 'trash'])->name('adminCatalogTrash');
        Route::get('/recycle', [CatalogController::class, 'recycle'])->name('adminCatalogRecycle');
        Route::get('/restore/{id}', [CatalogController::class, 'restore'])->name('adminCatalogRestore');
        Route::get('/delete/{id}', [CatalogController::class, 'delete'])->name('adminCatalogDelete');
    });

    // Brand
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('adminBrandIndex');
        Route::get('/add', [BrandController::class, 'add'])->name('adminBrandAdd');
        Route::post('/postAdd', [BrandController::class, 'postAdd'])->name('adminBrandPostAdd');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('adminBrandEdit');
        Route::post('/postEdit/{id}', [BrandController::class, 'postEdit'])->name('adminBrandPostEdit');
        Route::get('/status/{id}', [BrandController::class, 'status'])->name('adminBrandStatus');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('adminBrandDelete');
    });

    // Producer
    Route::group(['prefix' => 'producer'], function () {
        Route::get('/', [ProducerController::class, 'index'])->name('adminProducerIndex');
        Route::get('/add', [ProducerController::class, 'add'])->name('adminProducerAdd');
        Route::post('/postAdd', [ProducerController::class, 'postAdd'])->name('adminProducerPostAdd');
        Route::get('/edit/{id}', [ProducerController::class, 'edit'])->name('adminProducerEdit');
        Route::post('/postEdit/{id}', [ProducerController::class, 'postEdit'])->name('adminProducerPostEdit');
        Route::get('/status/{id}', [ProducerController::class, 'status'])->name('adminProducerStatus');
        Route::get('/delete/{id}', [ProducerController::class, 'delete'])->name('adminProducerDelete');
    });

    // Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('adminProductIndex');
        Route::get('/add', [ProductController::class, 'add'])->name('adminProductAdd');
        Route::post('/postAdd', [ProductController::class, 'postAdd'])->name('adminProductPostAdd');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('adminProductEdit');
        Route::post('/postEdit/{id}', [ProductController::class, 'postEdit'])->name('adminProductPostEdit');
        Route::get('/status/{id}', [ProductController::class, 'status'])->name('adminProductStatus');
        Route::get('/trash/{id}', [ProductController::class, 'trash'])->name('adminProductTrash');
        Route::get('/recycle', [ProductController::class, 'recycle'])->name('adminProductRecycle');
        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('adminProductRestore');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('adminProductDelete');
    });

    // Slider
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', [SliderController::class, 'index'])->name('adminSliderIndex');
        Route::get('/add', [SliderController::class, 'add'])->name('adminSliderAdd');
        Route::post('/postAdd', [SliderController::class, 'postAdd'])->name('adminSliderPostAdd');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('adminSliderEdit');
        Route::post('/postEdit/{id}', [SliderController::class, 'postEdit'])->name('adminSliderPostEdit');
        Route::get('/status/{id}', [SliderController::class, 'status'])->name('adminSliderStatus');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('adminSliderDelete');
    });
});
