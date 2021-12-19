
<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;
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


Route::get('/migrate', function () {

    // Call seeder
    \Artisan::call('db:seed', [
        '--class' => 'addData',
        '--force' => true // <--- add this line
    ]);
});
//All
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('/');

    Route::get('/queues', [HomeController::class, 'queues'])->name('queues');

    Route::resource('queue', QueueController::class)->except([
        'show',
    ]);

    Route::resource('service', CategoriesController::class)->except([
        'index', 'show'
    ]);

    Route::post('update', [HomeController::class, 'update'])->name('client.updateProfile');

    Route::delete('deelte/user/{id}', [HomeController::class, 'destroy'])->name('client.destroy');

    Route::post('queue/status/{id}', [QueueController::class, 'changeStatus'])->name('changeStatus');
});

// require __DIR__ . './auth.php';
Auth::routes();
