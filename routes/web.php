<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommitteeChiefController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProjectManagerController;
use App\Models\Log;

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
Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/asset', [AssetController::class, "index"])->name("asset.index");
Route::get('/asset/{id}', [AssetController::class, 'show'])->name('asset.show');
Route::get('/client-asset/{id}', [AssetController::class, 'client'])->name('asset.client');
Route::get('/asset/{id}/edit', [AssetController::class, 'edit'])->name('asset.edit');
Route::put('/asset/{id}/update', [AssetController::class, 'update'])->name('asset.update');

Route::match(['get', 'post'], '/test', [AssetController::class, 'test']);

Route::post('/asset/store', [AssetController::class, "store"])->name("asset.store");
Route::get('/committee_chiefs', [CommitteeChiefController::class, "index"])->name("committee_chiefs.index");
Route::post('/committee_chiefs/store', [CommitteeChiefController::class, "store"])->name("committee_chiefs.store");
Route::get('/project_managers', [ProjectManagerController::class, "index"])->name("project_managers.index");
Route::post('/project_managers/store', [ProjectManagerController::class, "store"])->name("project_managers.store");
Route::get('/logs', [LogController::class, "index"])->name("logs.index");



Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::get('/', function () {
//     return view('welcome');
// });
