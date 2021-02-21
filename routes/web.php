<?php

use App\Http\Controllers\AllPermissions;
use App\Http\Controllers\AllRoles;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\BuldingFloorRoom;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix'=>'dashboard/','as'=>'dashboard.'/*,'middleware' => 'auth'*/], function(){
    Route::resource('/package', PackageController::class);
    Route::resource('/client', CustomerController::class);
    Route::resource('/roles', AllRoles::class);
    Route::resource('/permissions', AllPermissions::class);
    Route::resource('/user', UserController::class);
    Route::resource('/building', BuildingController::class);
    Route::resource('/floor', FloorController::class);
    Route::resource('/room', RoomController::class);
  //  Route::get('connect', ['as' => 'connect', 'uses' = > 'AccountController@connect']);


});
//Route::get('packages/list', [tableDataController::class, 'getAllPakage'])->name('packages.list');
// all data from floor By Building

Route::get("/getfloor",[BuldingFloorRoom::class,'getFloorByBuilding']);
Route::get("/getroom",[BuldingFloorRoom::class,'getRoomByFloor']);
require __DIR__.'/auth.php';
