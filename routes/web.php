<?php


use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about'); //Gets whats inside pages controller
Route::get('/users/{id}/{comp}', 'PagesController@users'); 
// Route::get('/users/{id}/{comp}', function ($id,$comp) {
//     return 'User is:'.$id.'<br>'.'Company Name:'.$comp;
// });
Route::get('department', 'departmentcontroller@index');
Route::get('add-department', 'departmentcontroller@create');
Route::post('store-department', 'departmentcontroller@store');
Route::get('edit_department/{id}', 'departmentcontroller@edit');
Route::put('update-department/{id}', 'departmentcontroller@update');
// Route::get('delete_department/{id}', 'departmentcontroller@delete');
Route::delete('delete_department/{id}', 'departmentcontroller@delete');

// Apply Leave
Route::get('add_applyleave',[App\Http\Controllers\Admin\ApplyleaveController::class,'create']);
Route::post('add_applyleave',[App\Http\Controllers\Admin\ApplyleaveController::class,'store']);
Route::get('show_applyleave',[App\Http\Controllers\Admin\ApplyleaveController::class,'show']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){   //,'isAdmin'
Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin/dashboard');
Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'index']);
Route::get('add_category',[App\Http\Controllers\Admin\CategoryController::class,'create']);
Route::post('add_category',[App\Http\Controllers\Admin\CategoryController::class,'store']);
Route::get('edit_category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'edit']);
Route::put('update_category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'update']);
Route::delete('delete_category/{category_id}',[App\Http\Controllers\Admin\CategoryController::class,'delete']);

// Leavetype inside admin panel
Route::get('leavetype',[App\Http\Controllers\Admin\LeavetypeController::class,'index']);


Route::get('add_leavetype',[App\Http\Controllers\Admin\LeavetypeController::class,'create']);
Route::post('add_leavetype',[App\Http\Controllers\Admin\LeavetypeController::class,'store']);
Route::get('edit_leavetype/{id}',[App\Http\Controllers\Admin\LeavetypeController::class,'edit']);
Route::put('update_leavetype/{id}',[App\Http\Controllers\Admin\LeavetypeController::class,'update']);
Route::delete('delete_leavetype/{id}',[App\Http\Controllers\Admin\LeavetypeController::class,'delete']);

//users inside admin panel
 Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
 Route::get('edit_user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit']);
 Route::put('update_user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update']);
  // Leave Types Routes
Route::get('applyleave',[App\Http\Controllers\Admin\ApplyleaveController::class,'index']);


// Route::get('add_applyleave',[App\Http\Controllers\Admin\ApplyleaveController::class,'create']);

// Route::post('add_applyleave',[App\Http\Controllers\Admin\ApplyleaveController::class,'store']);

Route::get('edit_applyleave/{id}',[App\Http\Controllers\Admin\ApplyleaveController::class,'edit']);
Route::put('update_applyleave/{id}',[App\Http\Controllers\Admin\ApplyleaveController::class,'update']);
Route::delete('delete_applyleave/{id}',[App\Http\Controllers\Admin\ApplyleaveController::class,'delete']);
 });


 
 