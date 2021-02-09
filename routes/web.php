<?php

use App\Http\Controllers\AllPermissions;
use App\Http\Controllers\AllRoles;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('Backend.Dashboard.Dashboard');
})->middleware(['auth'])->name('dashboard');

// dash Board controll

Route::group(['prefix'=>'dashboard/','as'=>'dashboard.'], function(){
    Route::resource('/package', PackageController::class);
    Route::resource('/client', CustomerController::class);
    Route::resource('/roles', AllRoles::class);
    Route::resource('/permissions', AllPermissions::class);
  //  Route::get('connect', ['as' => 'connect', 'uses' = > 'AccountController@connect']);

    // all data from table contoller

}) ;
//Route::get('packages/list', [tableDataController::class, 'getAllPakage'])->name('packages.list');
require __DIR__.'/auth.php';
