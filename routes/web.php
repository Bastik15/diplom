<?php

use App\Http\Controllers\History\HistoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Worker\WorkerController;
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
    return view('main');
});

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::post('/preregister', 'PreRegistration')->name('preRegistration');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Для всех
    Route::group(['namespace' => 'App\Http\Controllers\Product'], function () {
        Route::get('/products', [ProductController::class, 'index'])->name('product.index');
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
        Route::post('/products', [ProductController::class, 'store'])->name('product.store');
        Route::patch('/products/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::post('/products/export', [ProductController::class, 'export'])->name('product.export');
    });

    Route::group(['namespace' => 'App\Http\Controllers\History'], function () {
        Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
        Route::post('/history/export', [HistoryController::class, 'export'])->name('history.export');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Transaction'], function () {
        Route::get('/transaction/expense', [TransactionController::class, 'createExpense'])->name('transaction.createExpense');
        Route::get('/transaction/coming', [TransactionController::class, 'createComing'])->name('transaction.createComing');
        Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Personal'], function () {
        Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Partner'], function () {
        Route::get('/partners', [PartnerController::class, 'index'])->name('partner.index');
        Route::post('/partners', [PartnerController::class, 'store'])->name('partner.store');
        Route::patch('/partners/{partner}', [PartnerController::class, 'update'])->name('partner.update');
        Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partner.destroy');
        // Route::get('/partners/create', [PartnerController::class, 'create'])->name('partner.create');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Worker'], function () {
        Route::post('/workers', [WorkerController::class, 'store'])->name('worker.store');
        Route::delete('/workers/{worker}', [WorkerController::class, 'delete'])->name('worker.destroy');
    });

    // Администратор
    Route::group(['middleware' => 'admin'], function () {
        Route::group(['namespace' => 'App\Http\Controllers\Personal'], function () {
            Route::patch('/personal/{user}', [PersonalController::class, 'update'])->name('personal.update');
            Route::delete('/personal/{user}', [PersonalController::class, 'destroy'])->name('personal.destroy');
        });
    });
});
