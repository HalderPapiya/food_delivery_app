<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;

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

Route::get('cache', function () {

    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');

    dd("Cache is cleared");
});


// Route::get('/', function () {


// Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
// return view('frontend.index');


// });



// ------------------------User End--------------------------------//
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });
    Route::middleware(['auth:admin'])->group(function () {
        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'], function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('profile');
        Route::post('/profile', [App\Http\Controllers\HomeController::class, 'userProfileSave'])->name('profile.save');
        // Route::get('user/change/password','HomeController@changePassword')->name('user.changepassword');
        Route::post('admin/change/password', [App\Http\Controllers\HomeController::class, 'updateUserPassword'])->name('changepassword.save');

        //-----------------User----------------

        Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
        Route::get('/user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.delete');
        Route::post('/user/updateStatus', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('user.updateStatus');

          //-----------------Agent----------------

          Route::get('/agent', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('agent.index');
          Route::get('/agent/create', [App\Http\Controllers\Admin\AgentController::class, 'create'])->name('agent.create');
          Route::post('/agent/store', [App\Http\Controllers\Admin\AgentController::class, 'store'])->name('agent.store');
          Route::get('/agent/edit/{id}', [App\Http\Controllers\Admin\AgentController::class, 'edit'])->name('agent.edit');
          Route::post('/agent/update/{id}', [App\Http\Controllers\Admin\AgentController::class, 'update'])->name('agent.update');
          Route::get('/agent/delete/{id}', [App\Http\Controllers\Admin\AgentController::class, 'destroy'])->name('agent.delete');
          Route::post('/agent/updateStatus', [App\Http\Controllers\Admin\AgentController::class, 'updateStatus'])->name('agent.updateStatus');
          Route::post('/agent/updateVerification', [App\Http\Controllers\Admin\AgentController::class, 'updateVerification'])->name('agent.updateVerification');

           //-----------------Agent-Salary----------------

           Route::get('/agent-salary', [App\Http\Controllers\Admin\AgentSalaryController::class, 'index'])->name('agent.salary.index');
           Route::get('/agent-salary/create', [App\Http\Controllers\Admin\AgentSalaryController::class, 'create'])->name('agent.salary.create');
           Route::post('/agent-salary/store', [App\Http\Controllers\Admin\AgentSalaryController::class, 'store'])->name('agent.salary.store');
           Route::get('/agent-salary/edit/{id}', [App\Http\Controllers\Admin\AgentSalaryController::class, 'edit'])->name('agent.salary.edit');
           Route::post('/agent-salary/update/{id}', [App\Http\Controllers\Admin\AgentSalaryController::class, 'update'])->name('agent.salary.update');
           Route::get('/agent-salary/delete/{id}', [App\Http\Controllers\Admin\AgentSalaryController::class, 'destroy'])->name('agent.salary.delete');
           Route::post('/agent-salary/updateStatus', [App\Http\Controllers\Admin\AgentSalaryController::class, 'updateStatus'])->name('agent.salary.updateStatus');



            //-----------------Merchant----------------

          Route::get('/merchant', [App\Http\Controllers\Admin\MerchantController::class, 'index'])->name('merchant.index');
          Route::get('/merchant/create', [App\Http\Controllers\Admin\MerchantController::class, 'create'])->name('merchant.create');
          Route::post('/merchant/store', [App\Http\Controllers\Admin\MerchantController::class, 'store'])->name('merchant.store');
          Route::get('/merchant/edit/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'edit'])->name('merchant.edit');
          Route::post('/merchant/update/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'update'])->name('merchant.update');
          Route::get('/merchant/delete/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'destroy'])->name('merchant.delete');
          Route::post('/merchant/updateStatus', [App\Http\Controllers\Admin\MerchantController::class, 'updateStatus'])->name('merchant.updateStatus');
          Route::post('/merchant/updateVerification', [App\Http\Controllers\Admin\MerchantController::class, 'updateVerification'])->name('merchant.updateVerification');



    });
});